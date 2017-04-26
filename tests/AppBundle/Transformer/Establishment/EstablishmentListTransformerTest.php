<?php
namespace AppBundle\Test\Transformer\Establishment;

use AppBundle\Entity\Establishment\EstablishmentInterface;
use AppBundle\Entity\Establishment\EstablishmentList;
use AppBundle\Transformer\Establishment\EstablishmentListTransformer;
use AppBundle\Transformer\Establishment\EstablishmentListTransformerInterface;

class EstablishmentListTransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @var EstablishmentListTransformer */
    private $sut;

    protected function setUp()
    {
        $this->sut = new EstablishmentListTransformer();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(EstablishmentListTransformerInterface::class, $this->sut);
    }

    public function testShouldTransform()
    {
        $ratingValue1 = '1';
        $ratingValue2 = '2';
        $ratingValue3 = 'Exempt';
        $ratingValue4 = 'Exempt';

        $establishment1 = $this->createMock(EstablishmentInterface::class);
        $establishment2 = $this->createMock(EstablishmentInterface::class);
        $establishment3 = $this->createMock(EstablishmentInterface::class);
        $establishment4 = $this->createMock(EstablishmentInterface::class);

        $establishmentList = new EstablishmentList();
        $establishmentList->add($establishment1);
        $establishmentList->add($establishment2);
        $establishmentList->add($establishment3);
        $establishmentList->add($establishment4);

        $establishment1->method('getRatingValue')->willReturn($ratingValue1);
        $establishment2->method('getRatingValue')->willReturn($ratingValue2);
        $establishment3->method('getRatingValue')->willReturn($ratingValue3);
        $establishment4->method('getRatingValue')->willReturn($ratingValue4);

        $expected = [
            ['rating' => '1-star', 'percentage' => 25.0],
            ['rating' => '2-star', 'percentage' => 25.0],
            ['rating' => 'Exempt', 'percentage' => 50.0]
        ];

        $actual = $this->sut->transform($establishmentList);

        $this->assertSame($expected, $actual);
    }
}
