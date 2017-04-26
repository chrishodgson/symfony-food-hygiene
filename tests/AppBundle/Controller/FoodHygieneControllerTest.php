<?php
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FoodHygieneControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testIndexGet()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Local Authority Food Hygiene Ratings', $crawler->filter('#content h4')->text());
    }

    public function testIndexPost()
    {
        $crawler = $this->client->request('POST', '/', [
            'appbundle_local_authority_search' => [
                'local_authority_id' => 197
            ]
        ]);

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Percentage', $crawler->filter('#ratings-table-header')->text());
    }
}
