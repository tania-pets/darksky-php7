<?php
namespace Taniapets\DarkSky\Requests;


Final Class TimeMachineRequest extends WeatherRequest
{
    /*string the timestamp for the day to get the weather for*/
    private $timestamp;

    public function __construct($lat, $long, $timestamp)
    {
        $this->lat = $lat;
        $this->long = $long;
        $this->timestamp = $timestamp;
    }

    public function getPath(): string
    {
        return $this->path . '/' . $this->lat . ',' . $this->long . ',' . $this->timestamp;
    }


}
