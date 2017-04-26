<?php
namespace AppBundle\Tests\Entity\Condatis\V1\Sport;

use AppBundle\Entity\BaseList;
use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;
use AppBundle\Entity\LocalAuthority\LocalAuthorityList;

class LocalAuthorityListTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthorityList */
    private $sut;

    protected function setUp()
    {
        $this->sut = new LocalAuthorityList();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(BaseList::class, $this->sut);
    }

    public function testAdd()
    {
        $localAuthority = $this->createMock(LocalAuthorityInterface::class);

        $this->sut->append($localAuthority);
        $return = $this->sut->add($localAuthority);

        $this->assertContainsOnlyInstancesOf(LocalAuthorityInterface::class, $this->sut);
        $this->assertSame($this->sut, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructValidation()
    {
        $localAuthority = 'invalid';

        $this->sut->append($localAuthority);
    }
}
