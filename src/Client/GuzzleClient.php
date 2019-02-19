<?php

namespace Taniapets\DarkSky\Client;

use GuzzleHttp\Client;
use Taniapets\DarkSky\DarkSkyException;
use Taniapets\DarkSky\Requests\AbstractRequest;


Class GuzzleClient implements ClientInterface
{
    /* GuzzleHttp\Client, the http client*/
    private $client;

    public function __construct($baseUrl)
    {
        $this->client = new Client(['base_uri' => $baseUrl]);
    }


    /**
     * Get Request
     * @param AbstractRequest $request, the request to GET
     * @return    string, the json of response's body contents
     */
    public function get(AbstractRequest $request) : string
    {
        try {
            $response = $this->client->request('GET', $request->getPath(), $request->getOptions());
            if ($response->getStatusCode() != 200) {
                throw new DarkSkyException('Service unavailable responded with code: ' . $response->getStatusCode());
            }
            return $response->getBody()->getContents();
        } catch (\Exception $e)
        {
            throw new DarkSkyException($e->getMessage());
        }
    }


    public function post(AbstractRequest $request): string
    {
        throw new \Exception('Not implemented');
        //not implemented
    }




}
