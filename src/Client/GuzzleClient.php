<?php

namespace Taniapets\DarkSky\Client;

use GuzzleHttp\Client;
use Taniapets\DarkSky\DarkSkyException;

Class GuzzleClient implements ClientInterface
{

    private $client;

    public function __construct($baseUrl)
    {
        $this->client = new Client(['base_uri' => $baseUrl]);
    }

    public function get($request)
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


    public function post($request)
    {
        throw new \Exception('Not implemented');
        //not implemented
    }




}
