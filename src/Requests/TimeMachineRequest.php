<?php
namespace Taniapets\DarkSky\Requests;


Final Class TimeMachineRequest extends WeatherRequest
{
    /*string the timestamp for the day to get the weather for*/
    private $timestamp;

    public function __construct($apiKey, $lat, $long, $timestamp)
    {
        parent::__construct($apiKey, $lat, $long);

        $this->timestamp = $timestamp;
    }

    public function getPath(): string
    {
        return $this->path . '/' .$this->apiKey . '/' . $this->lat . ',' . $this->long . ',' . $this->timestamp;
    }


}
