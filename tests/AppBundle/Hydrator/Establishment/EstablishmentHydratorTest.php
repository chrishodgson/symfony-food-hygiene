<?php
namespace AppBundle\Tests\Hydrator\Establishment;

use AppBundle\Entity\Establishment\Establishment;
use AppBundle\Hydrator\Establishment\EstablishmentHydrator;
use AppBundle\Hydrator\Establishment\EstablishmentHydratorInterface;

class EstablishmentHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var EstablishmentHydrator */
    private $sut;

    protected function setUp()
    {
        $this->sut = new EstablishmentHydrator();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(EstablishmentHydratorInterface::class, $this->sut);
    }

    public function testShouldHydrate()
    {
        $localAuthorityBusinessID = '123';
        $ratingValue = '5';

        $data = (object) [
            'LocalAuthorityBusinessID' => $localAuthorityBusinessID,
            'RatingValue' => $ratingValue
        ];

        $establishment = $this->sut->hydrate($data, new Establishment());

        $this->assertSame($localAuthorityBusinessID, $establishment->getLocalAuthorityBusinessID());
        $this->assertSame($ratingValue, $establishment->getRatingValue());
    }
}
