<?php
namespace Taniapets\DarkSky;

use Taniapets\DarkSky\Client\ClientFactory;
use Taniapets\DarkSky\Requests\{TimeMachineRequest,ForecastRequest};

class DarkSky
{

    const SERVICE_BASE_URL = 'https://api.darksky.net/';

    private $apiKey;
    private $prefs = ['lang' => 'en', 'units' => 'auto'];
    private $client;


    public function __construct(string $apiKey, $prefs = [])
    {
        $this->apiKey = $apiKey;
        $this->client = ClientFactory::makeClient(self::SERVICE_BASE_URL);
        $this->prefs = array_merge($this->prefs, $prefs);
    }

    public function setUnits($units)
    {
        $this->prefs['units'] = $units;
    }

    public function setLang($lang)
    {
        $this->prefs['lang'] = $lang;
    }


    public function timeMachine(float $lat, float $long, string $timestamp, array $exclude = [])
    {
        $request = (new TimeMachineRequest($lat, $long, $timestamp))
                    ->attachKey($this->apiKey)
                    ->attachPrefs($this->prefs)
                    ->attachExclude($exclude);
        try {
            return $this->client->get($request);
        }
        catch (\Exception $e)
        {

        }
    }

    public function forecast(float $lat, float $long, array $exclude = [], string $extend = null)
    {
        $request = (new ForecastRequest($lat, $long, $timestamp))
                    ->attachKey($this->apiKey)
                    ->attachPrefs($this->prefs)
                    ->attachExclude($exclude)
                    ->attachExtend($extend);

        return  $this->client->get($request);
    }








}
