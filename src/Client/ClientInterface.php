<?php

namespace Taniapets\DarkSky\Client;

use Taniapets\DarkSky\Requests\WeatherRequest;
/**
 * Interface for hhtp client
 */

interface ClientInterface
{
    public function get(WeatherRequest $request) : string;

    public function getConcurrent(array $requests) : array;

    public function post(WeatherRequest $request) : string;

}
