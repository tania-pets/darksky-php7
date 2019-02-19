<?php
namespace Taniapets\DarkSky\Responses;


Class ForecastResponse
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function currently()
    {
        return $this->getDataFor('currently');
    }

    public function minutely()
    {
        return $this->getDataFor('minutely');
    }

    public function hourly()
    {
        return $this->getDataFor('hourly');
    }

    public function daily()
    {
        return $this->getDataFor('daily');
    }

    public function alerts()
    {
        return $this->getDataFor('alerts');
    }

    public function flags()
    {
        return $this->getDataFor('flags');
    }

    public function getData()
    {
        return $this->data;
    }

    private function getDataFor($frequency)
    {
        return $this->data[$frequency] ?? null;
    }



}
