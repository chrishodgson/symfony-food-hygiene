<?php
namespace AppBundle\Tests\Mapper\LocalAuthority;

use AppBundle\Entity\Establishment\EstablishmentListInterface;
use AppBundle\Hydrator\Establishment\EstablishmentListHydratorInterface;
use AppBundle\Mapper\Establishment\EstablishmentMapper;
use AppBundle\Mapper\Establishment\EstablishmentMapperInterface;
use AppBundle\Mapper\Establishment\EstablishmentQuery;

class EstablishmentMapperTest extends \PHPUnit_Framework_TestCase
{
    /** @var EstablishmentMapper */
    private $sut;

    /** @var EstablishmentListHydratorInterface | \PHPUnit_Framework_MockObject_MockObject */
    private $establishmentListHydrator;

    protected function setUp()
    {
        $this->establishmentListHydrator = $this->createMock(EstablishmentListHydratorInterface::class);

        $this->sut = new EstablishmentMapper($this->establishmentListHydrator);
    }

    public function testShouldImplementAppropriateInterfaces()
    {
        $this->assertInstanceOf(EstablishmentMapperInterface::class, $this->sut);
    }

    public function testShouldMap()
    {
        $query = $this->createMock(EstablishmentQuery::class);

        $hydratedList = $this->createMock(EstablishmentListInterface::class);

        $this->establishmentListHydrator
            ->expects($this->once())
            ->method('hydrate')
            ->willReturn($hydratedList);

        $result = $this->sut->getBy($query);

        $this->assertSame($hydratedList, $result);
    }
}
