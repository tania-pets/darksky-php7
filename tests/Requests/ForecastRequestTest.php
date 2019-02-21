<?php

namespace Tests\Requests;

use PHPUnit\Framework\TestCase;
use Taniapets\DarkSky\Requests\ForecastRequest;

Class ForecastRequestTest extends TestCase
{
    const LAT = 40.6211912;
    const LONG = 22.9285177;
    const REQUEST_PATH = 'forecast/';
    const API_KEY = 'dummy_key';

    public function testGetPath()
    {
        $request = new ForecastRequest(self::API_KEY, self::LAT, self::LONG);
        $this->assertEquals($request->getPath(), self::REQUEST_PATH . self::API_KEY . '/' . self::LAT . ',' . self::LONG);
    }


}
