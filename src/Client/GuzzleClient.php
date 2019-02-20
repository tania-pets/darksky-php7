<?php

namespace Taniapets\DarkSky\Client;

use GuzzleHttp\Client;
use Taniapets\DarkSky\DarkSkyException;
use Taniapets\DarkSky\Requests\WeatherRequest;
use GuzzleHttp\Promise;

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
     * @param WeatherRequest $request, the request to GET
     * @return    string, the json of response's body contents
     */
    public function get(WeatherRequest $request) : string
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


    /**
     * Executes get requests concurrently, http://docs.guzzlephp.org/en/stable/quickstart.html#concurrent-requests
     * @param array $requests, array of WeatherRequest
     * @return    array
     */
    public function getConcurrent(array $requests): array
    {
        foreach ($requests as $key => $request)
        $promises[$key] = $this->client->getAsync($request->getPath(), $request->getOptions());
        try {
            $responses = Promise\unwrap($promises);
            $responses = Promise\settle($promises)->wait();
            foreach ($responses as $rKey => $response) {
                $responseArray[$rKey] = $response['value']->getBody()->getContents();
            }
            return $responseArray;
        } catch (\Exception $e) {
            throw new DarkSkyException($e->getMessage());
        }
    }


    public function post(WeatherRequest $request): string
    {
        throw new \Exception('Not implemented');
        //not implemented
    }




}
