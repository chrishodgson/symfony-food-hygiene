<?php
namespace AppBundle\Tests\Http\Request;

use AppBundle\Http\Request\GetRequest;

class GetRequestTest extends \PHPUnit_Framework_TestCase
{
    /** @var GetRequest */
    private $sut;

    protected function setUp()
    {
        $this->sut = new GetRequest(
            'http://api.ratings.food.gov.uk/Authorities/basic',  [
                'x-api-version' => 2
            ]
        );
    }

    public function testShouldExecuteAndDecode()
    {
        $this->sut->executeAndDecode();
        $response = $this->sut->getResponse();

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('application/json; charset=utf-8', $response->getHeaderLine('content-type'));
    }
}
