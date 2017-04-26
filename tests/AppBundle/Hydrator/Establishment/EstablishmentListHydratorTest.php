<?php
namespace AppBundle\Tests\Hydrator\LocalAuthority;

use AppBundle\Entity\Establishment\EstablishmentInterface;
use AppBundle\Entity\Establishment\EstablishmentList;
use AppBundle\Hydrator\Establishment\EstablishmentHydratorInterface;
use AppBundle\Hydrator\Establishment\EstablishmentListHydrator;
use AppBundle\Hydrator\Establishment\EstablishmentListHydratorInterface;

class EstablishmentListHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var EstablishmentListHydrator */
    private $sut;

    /** @var EstablishmentHydratorInterface | \PHPUnit_Framework_MockObject_MockObject */
    private $establishmentHydrator;

    protected function setUp()
    {
        $this->establishmentHydrator = $this->createMock(EstablishmentHydratorInterface::class);
        $this->sut = new EstablishmentListHydrator($this->establishmentHydrator);
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(EstablishmentListHydratorInterface::class, $this->sut);
    }

    public function testShouldHydrate()
    {
        $establishment1Data = 'establishment1Data';
        $establishment2Data = 'establishment2Data';

        $establishment1 = $this->createMock(EstablishmentInterface::class);
        $establishment2 = $this->createMock(EstablishmentInterface::class);

        $data = (object) [
            'establishments' => [
                $establishment1Data,
                $establishment2Data
            ]
        ];

        $this->establishmentHydrator->expects($this->exactly(2))
            ->method('hydrate')
            ->withConsecutive([$establishment1Data], [$establishment2Data])
            ->willReturnOnConsecutiveCalls($establishment1, $establishment2);

        $list = $this->sut->hydrate($data, new EstablishmentList());

        $this->assertCount(2, $list);
        $this->assertSame($establishment1, $list->getIterator()[0]);
        $this->assertSame($establishment2, $list->getIterator()[1]);
    }
}
