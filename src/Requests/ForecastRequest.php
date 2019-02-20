<?php
namespace Taniapets\DarkSky\Requests;


Final Class ForecastRequest extends WeatherRequest
{
    /**
     * Gets the path of the $request
     * @return    string
     */
    public function getPath(): string
    {
        return $this->path . '/' . $this->lat . ',' . $this->long;
    }


    /**
     * Attaches the 'extended' param  to the request's query
     */
    public function attachExtend($extend): ForecastRequest
    {
        $this->queryAttach(['extend' => $extend]);
        return $this;
    }

}
