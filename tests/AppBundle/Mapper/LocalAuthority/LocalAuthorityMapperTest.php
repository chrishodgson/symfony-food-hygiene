<?php
namespace AppBundle\Tests\Mapper\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityList;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityListHydratorInterface;
use AppBundle\Mapper\LocalAuthority\LocalAuthorityMapper;
use AppBundle\Mapper\LocalAuthority\LocalAuthorityMapperInterface;
use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class LocalAuthorityMapperTest extends \PHPUnit_Framework_TestCase
{
    /** @var LocalAuthorityMapper */
    private $sut;

    /** @var LocalAuthorityListHydratorInterface | \PHPUnit_Framework_MockObject_MockObject */
    private $localAuthorityListHydrator;

    protected function setUp()
    {
        $this->localAuthorityListHydrator = $this->createMock(LocalAuthorityListHydratorInterface::class);

        $this->sut = new LocalAuthorityMapper($this->localAuthorityListHydrator);
    }

    public function testShouldImplementAppropriateInterfaces()
    {
        $this->assertInstanceOf(LocalAuthorityMapperInterface::class, $this->sut);
    }

    public function testShouldMap()
    {
        $hydratedList = $this->createMock(LocalAuthorityListInterface::class);

        $this->localAuthorityListHydrator
            ->expects($this->once())
            ->method('hydrate')
            ->willReturn($hydratedList);

        $result = $this->sut->get();

        $this->assertSame($hydratedList, $result);
    }
}
