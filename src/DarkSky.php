<?php
namespace Taniapets\DarkSky;

/**
 * Wrapper class for DarkSky weather API
 * https://darksky.net/dev/docs
 */

use Taniapets\DarkSky\Client\ClientFactory;
use Taniapets\DarkSky\Requests\{TimeMachineRequest,ForecastRequest};
use \Taniapets\DarkSky\Responses\ForecastResponse;

class DarkSky
{

    const SERVICE_BASE_URL = 'https://api.darksky.net/';

    /* string api key */
    private $apiKey;
    /* user preferences */
    private $prefs = ['lang' => 'en', 'units' => 'auto'];
    /* the http client provided by ClientFactory*/
    private $client;

    /**
     * Constructs a new DarkSky object
     * @param string $apiKey, the api key
     * @param array $prefs, the user preferences [units, lang]
     */
    public function __construct(string $apiKey, $prefs = [])
    {
        $this->apiKey = $apiKey;
        $this->client = ClientFactory::makeClient(self::SERVICE_BASE_URL);
        $this->prefs = array_merge($this->prefs, $prefs);
    }

    /**
     * Set the units after the object initialization
     * @param string $units, the units
     * @return    void
     */
    public function setUnits($units) : void
    {
        $this->prefs['units'] = $units;
    }

    /**
     * Set the language after the object initialization
     * @param string $lang, the language
     * @return    void
     */
    public function setLang($lang): void
    {
        $this->prefs['lang'] = $lang;
    }


    /**
     * Gets results for time machine request for given point and timestamp
     * @param float $lat, the point's latitude
     * @param float $long, the point's longtitude
     * @param array $timestamps, array for the the timestamps for which we ask historical weather
     * @param array $exclude, data blocks to be excluded
     * @return array of ForecastResponse
     * @copyright
     */
    public function timeMachine(float $lat, float $long, array $timestamps, array $exclude = []): array
    {
        foreach ($timestamps as $timestamp) {
            $requests[$timestamp] = (new TimeMachineRequest($this->apiKey, $lat, $long, $timestamp))
                        ->attachPrefs($this->prefs)
                        ->attachExclude($exclude);
        }
        $httpResponses = $this->client->getConcurrent($requests);
        foreach ($httpResponses as $timestamp => $response) {
            $responseDataArray = json_decode($response, true);
            $timeMachineResponses[$timestamp] = new ForecastResponse($responseDataArray);
        }
        return $timeMachineResponses;
    }

    /**
     * Gets results for time machine request for given point and timestamp
     * @param float $lat, the point's latitude
     * @param float $long, the point's longtitude
     * @param array $exclude, data blocks to be excluded
     * @param string $extend, for extending the results by given the value 'hourly'
     * @copyright
     */
    public function forecast(float $lat, float $long, array $exclude = [], string $extend = null): ForecastResponse
    {
        $request = (new ForecastRequest($this->apiKey, $lat, $long))
                    ->attachPrefs($this->prefs)
                    ->attachExclude($exclude)
                    ->attachExtend($extend);
        $jsonResponse = $this->client->get($request);
        $data = json_decode($jsonResponse, true);
        return new ForecastResponse($data);
    }
}
