<?php
namespace Tests\Requests;

use Taniapets\DarkSky\Requests\ForecastRequest;
use Tests\RequestTest;

Class ForecastRequestTest extends RequestTest
{
    /**
    * @covers ForecastRequest::getPath
    */
    public function testGetPath()
    {
        $request = new ForecastRequest(self::API_KEY, self::LAT, self::LONG);
        $this->assertEquals($request->getPath(), self::REQUEST_PATH . self::API_KEY . '/' . self::LAT . ',' . self::LONG);
    }

    public function testAttachExtend()
    {
        $request = new ForecastRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachExtend('hourly');
        $requestQuery = self::getQuery($request);
        $this->assertEquals($requestQuery['extend'], 'hourly');
    }


}
