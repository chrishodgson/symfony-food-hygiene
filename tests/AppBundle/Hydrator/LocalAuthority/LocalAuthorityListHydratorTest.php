<?php
namespace AppBundle\Tests\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;
use AppBundle\Entity\LocalAuthority\LocalAuthorityList;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityHydrator;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityListHydrator;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityListHydratorInterface;

class LocalAuthorityListHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthorityListHydrator */
    private $sut;

    /** @var LocalAuthorityHydrator | \PHPUnit_Framework_MockObject_MockObject */
    private $localAuthorityHydrator;

    protected function setUp()
    {
        $this->localAuthorityHydrator = $this->createMock(LocalAuthorityHydrator::class);
        $this->sut = new LocalAuthorityListHydrator($this->localAuthorityHydrator);
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(LocalAuthorityListHydratorInterface::class, $this->sut);
    }

    public function testShouldHydrate()
    {
        $localAuthority1Data = 'localAuthority1Data';
        $localAuthority2Data = 'localAuthority2Data';

        $localAuthority1 = $this->createMock(LocalAuthorityInterface::class);
        $localAuthority2 = $this->createMock(LocalAuthorityInterface::class);

        $data = (object) [
            'authorities' => [
                $localAuthority1Data,
                $localAuthority2Data
            ]
        ];

        $this->localAuthorityHydrator->expects($this->exactly(2))
            ->method('hydrate')
            ->withConsecutive([$localAuthority1Data], [$localAuthority2Data])
            ->willReturnOnConsecutiveCalls($localAuthority1, $localAuthority2);

        $list = $this->sut->hydrate($data, new LocalAuthorityList());

        $this->assertCount(2, $list);
        $this->assertSame($localAuthority1, $list->getIterator()[0]);
        $this->assertSame($localAuthority2, $list->getIterator()[1]);
    }
}
