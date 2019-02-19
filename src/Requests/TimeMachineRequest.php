<?php
namespace Taniapets\DarkSky\Requests;


Final Class TimeMachineRequest extends AbstractRequest
{

    private $timestamp;

    public function __construct($lat, $long, $timestamp)
    {
        $this->lat = $lat;
        $this->long = $long;
        $this->timestamp = $timestamp;
    }

    public function getPath()
    {
        return $this->path . '/' . $this->lat . ',' . $this->long . ',' . $timestamp;
    }


}
