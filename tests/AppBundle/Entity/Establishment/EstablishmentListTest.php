<?php
namespace AppBundle\Tests\Entity\Condatis\V1\Sport;

use AppBundle\Entity\Establishment\EstablishmentInterface;
use AppBundle\Entity\Establishment\EstablishmentList;
use AppBundle\Entity\BaseList;

class EstablishmentListTest extends \PHPUnit_Framework_TestCase
{
    /** @var EstablishmentList */
    private $sut;

    protected function setUp()
    {
        $this->sut = new EstablishmentList();
    }

    public function testShouldImplementAppropriateInterface()
    {
        $this->assertInstanceOf(BaseList::class, $this->sut);
    }

    public function testAdd()
    {
        $establishment = $this->createMock(EstablishmentInterface::class);

        $this->sut->append($establishment);
        $return = $this->sut->add($establishment);

        $this->assertContainsOnlyInstancesOf(EstablishmentInterface::class, $this->sut);
        $this->assertSame($this->sut, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructValidation()
    {
        $establishment = 'invalid';

        $this->sut->append($establishment);
    }
}
