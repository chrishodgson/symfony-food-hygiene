<?php
namespace AppBundle\Tests\Mapper\Establishment;

use AppBundle\Mapper\Establishment\EstablishmentQuery;

class EstablishmentQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EstablishmentQuery
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new EstablishmentQuery();
    }

    public function testGetSetValidId()
    {
        $id = 123;

        $this->sut->setLocalAuthorityId($id);

        $this->assertEquals($id, $this->sut->getLocalAuthorityId());
    }
}
