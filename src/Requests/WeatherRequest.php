<?php
namespace Taniapets\DarkSky\Requests;

/**
 * WeatherRequest Parent Class for building request objects to be provided to Http Client
 */
Class WeatherRequest
{

    /*float, the latitude*/
    protected $lat;
    /*float, the longtitude*/
    protected $long;
    /*array the request's options*/
    protected $options = ['query' => []];

    protected $path = 'forecast';


    public function __construct($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }

    /**
     * Attaches the api key to request path
     */
    public function attachKey($apiKey): WeatherRequest
    {
        $this->path .= '/' . $apiKey;
        return $this;
    }

    /**
     * Attaches the preferences (unit, lang) to the request query
     */
    public function attachPrefs($prefs): WeatherRequest
    {
        $this->queryAttach($prefs);
        return $this;
    }

    /**
     * Attaches the excluded blocks to the request query
     */
    public function attachExclude(array $exclude): WeatherRequest
    {
        if (count($exclude)) {
            $this->queryAttach(['exclude' => implode(',', $exclude)]);
        }
        return $this;
    }


    /**
     * Returns the options of the request
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    /**
     * Adds a param to the request's query
     */
    protected function queryAttach(array $queryParams): void
    {
        $this->options['query'] = array_merge($this->options['query'], $queryParams);
    }
}
