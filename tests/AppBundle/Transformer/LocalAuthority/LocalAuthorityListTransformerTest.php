<?php
namespace AppBundle\Test\Transformer\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;
use AppBundle\Entity\LocalAuthority\LocalAuthorityList;
use AppBundle\Transformer\LocalAuthority\LocalAuthorityListTransformer;
use AppBundle\Transformer\LocalAuthority\LocalAuthorityListTransformerInterface;

class LocalAuthorityListTransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthorityListTransformer */
    private $sut;

    protected function setUp()
    {
        $this->sut = new LocalAuthorityListTransformer();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(LocalAuthorityListTransformerInterface::class, $this->sut);
    }

    public function testShouldTransform()
    {
        $name1 = 'Aberdeen';
        $name2 = 'Glasgow';

        $localAuthorityId1 = 123;
        $localAuthorityId2 = 345;

        $localAuthority1 = $this->createMock(LocalAuthorityInterface::class);
        $localAuthority2 = $this->createMock(LocalAuthorityInterface::class);

        $localAuthorityList = new LocalAuthorityList();
        $localAuthorityList->add($localAuthority1);
        $localAuthorityList->add($localAuthority2);

        $localAuthority1->method('getName')->willReturn($name1);
        $localAuthority1->method('getLocalAuthorityId')->willReturn($localAuthorityId1);

        $localAuthority2->method('getName')->willReturn($name2);
        $localAuthority2->method('getLocalAuthorityId')->willReturn($localAuthorityId2);

        $expected = [
            $name1 => $localAuthorityId1,
            $name2 => $localAuthorityId2
        ];

        $actual = $this->sut->transform($localAuthorityList);

        $this->assertSame($expected, $actual);
    }
}
