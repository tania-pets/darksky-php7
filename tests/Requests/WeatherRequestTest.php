<?php

namespace Tests\Requests;

use PHPUnit\Framework\TestCase;
use Taniapets\DarkSky\Requests\{WeatherRequest};

Class WeatherRequestTest extends TestCase
{
    const LAT = 40.6211912;
    const LONG = 22.9285177;
    const REQUEST_PATH = 'forecast/';
    const API_KEY = 'dummy_key';

    public function testAttachPrefs()
    {
        $request = new WeatherRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachPrefs(['units' => 'si', 'lang' => 'el']);
        $requestQuery = $request->getOptions()['query'];
        $this->assertEquals($requestQuery['units'], 'si');
        $this->assertEquals($requestQuery['lang'], 'el');
    }

    public function testAttachExclude()
    {
        $request = new WeatherRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachExclude(['currently', 'daily']);
        $requestQuery = $request->getOptions()['query'];
        $this->assertEquals($requestQuery['exclude'], 'currently,daily');
    }


}
