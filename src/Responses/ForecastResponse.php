<?php
namespace Taniapets\DarkSky\Responses;

/**
 * Class to provide the clients response in array format
 * It provides functions to return data per frequency (daily, hourly, etc..)
 */
Class ForecastResponse
{
    /* array of the data that api responded*/
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Returns the currently datablock
     */
    public function currently() : array
    {
        return $this->getDataFor('currently');
    }

    /**
     * Returns the minutely datablock
     */
    public function minutely(): array
    {
        return $this->getDataFor('minutely');
    }

    /**
     * Returns the hourly datablock
     */
    public function hourly(): array
    {
        return $this->getDataFor('hourly');
    }

    /**
     * Returns the daily datablock
     */
    public function daily(): array
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

    /**
     * Returns all responded data blocks
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Checks if requested data block exists and returns it
     * @param string $frequency - the requested frequence
     */
    private function getDataFor($frequency): array
    {
        return $this->data[$frequency] ?? [];
    }



}
