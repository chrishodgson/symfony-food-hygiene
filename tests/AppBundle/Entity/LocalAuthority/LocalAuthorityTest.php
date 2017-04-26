<?php
namespace AppBundle\Tests\Entity\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthority;
use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;

class LocalAuthorityTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthority */
    private $sut;

    protected function setUp()
    {
        $this->sut = new LocalAuthority();
    }

    public function testShouldImplementAppropriateInterfaces()
    {
        $this->assertInstanceOf(LocalAuthorityInterface::class, $this->sut);
    }

    public function testLocalAuthorityId()
    {
        $localAuthorityId = 123;

        $setterResult = $this->sut->setLocalAuthorityId($localAuthorityId);

        $this->assertSame($localAuthorityId, $this->sut->getLocalAuthorityId());
        $this->assertSame($this->sut, $setterResult);
    }

    public function testName()
    {
        $name = 'Local Authority Name';

        $setterResult = $this->sut->setName($name);

        $this->assertSame($name, $this->sut->getName());
        $this->assertSame($this->sut, $setterResult);
    }
}
