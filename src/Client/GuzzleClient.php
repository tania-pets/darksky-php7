<?php

namespace Taniapets\DarkSky\Client;

use GuzzleHttp\Client;


Class GuzzleClient implements ClientInterface
{

    private $client;

    public function __construct($baseUrl)
    {
        $this->client = new Client(['base_uri' => $baseUrl]);
    }

    public function get($request)
    {
        return $this->client->request('GET', $request->getPath(), $request->getOptions());
    }


    public function post($request)
    {
        throw new \Exception('Not implemented');
        //not implemented
    }




}
