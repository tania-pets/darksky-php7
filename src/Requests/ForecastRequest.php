<?php
namespace Taniapets\DarkSky\Requests;


Final Class ForecastRequest extends AbstractRequest
{

    public function __construct($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }

    public function getPath()
    {
        return $this->path . '/' . $this->lat . ',' . $this->long;
    }

    public function attachExtend($extend)
    {
        $this->queryAttach(['extend' => $extend]);
        return $this;
    }

}
