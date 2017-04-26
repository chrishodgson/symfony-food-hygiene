<?php
namespace AppBundle\Tests\Entity\Establishment;

use AppBundle\Entity\Establishment\Establishment;
use AppBundle\Entity\Establishment\EstablishmentInterface;

class EstablishmentTest extends \PHPUnit_Framework_TestCase
{
    /** @var Establishment */
    private $sut;

    protected function setUp()
    {
        $this->sut = new Establishment();
    }

    public function testShouldImplementAppropriateInterfaces()
    {
        $this->assertInstanceOf(EstablishmentInterface::class, $this->sut);
    }

    public function testEstablishmentId()
    {
        $localAuthorityBusinessID = "123";

        $setterResult = $this->sut->setLocalAuthorityBusinessID($localAuthorityBusinessID);

        $this->assertSame($localAuthorityBusinessID, $this->sut->getLocalAuthorityBusinessID());
        $this->assertSame($this->sut, $setterResult);
    }

    public function testRatingValue()
    {
        $ratingValue = '5';

        $setterResult = $this->sut->setRatingValue($ratingValue);

        $this->assertSame($ratingValue, $this->sut->getRatingValue());
        $this->assertSame($this->sut, $setterResult);
    }
}
