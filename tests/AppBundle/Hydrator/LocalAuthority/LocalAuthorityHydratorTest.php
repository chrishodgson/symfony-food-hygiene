<?php
namespace AppBundle\Tests\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthority;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityHydrator;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityHydratorInterface;

class LocalAuthorityHydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthorityHydrator */
    private $sut;

    protected function setUp()
    {
        $this->sut = new LocalAuthorityHydrator();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(LocalAuthorityHydratorInterface::class, $this->sut);
    }

    public function testShouldHydrate()
    {
        $localAuthorityId = 31542;
        $name = 'Local Authority 31542';

        $data = (object) [
            'LocalAuthorityId' => $localAuthorityId,
            'Name' => $name
        ];

        $localAuthority = $this->sut->hydrate($data, new LocalAuthority());

        $this->assertSame($localAuthorityId, $localAuthority->getLocalAuthorityId());
        $this->assertSame($name, $localAuthority->getName());
    }
}
