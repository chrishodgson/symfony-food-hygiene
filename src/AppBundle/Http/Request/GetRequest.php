<?php
namespace AppBundle\Http\Request;

use GuzzleHttp\Client;

class GetRequest
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var
     */
    private $response;

    /**
     * @param string $endpoint
     * @param array $headers
     */
    public function __construct(string $endpoint, array $headers = [])
    {
        $this->endpoint = $endpoint;

        $this->headers = $headers;

        $this->client = new Client();
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return $this
     */
    public function executeAndDecode()
    {
        $this->response = $this->client->request('GET', $this->endpoint, [
            'headers' => $this->headers
        ]);

        return json_decode($this->response->getBody()->getContents());
    }
}