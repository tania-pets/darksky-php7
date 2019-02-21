<?php
namespace Tests\Requests;

use Taniapets\DarkSky\Requests\{WeatherRequest};
use Tests\RequestTest;

Class WeatherRequestTest extends RequestTest
{

    /**
    * @covers WeatherRequest::attachPrefs
    */
    public function testAttachPrefs()
    {
        $request = new WeatherRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachPrefs(['units' => 'si', 'lang' => 'el']);
        $requestQuery = self::getQuery($request);
        $this->assertEquals($requestQuery['units'], 'si');
        $this->assertEquals($requestQuery['lang'], 'el');
    }


    /**
    * @covers WeatherRequest::attachExclude
    */
    public function testAttachExclude()
    {
        $request = new WeatherRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachExclude(['currently', 'daily']);
        $requestQuery = self::getQuery($request);
        $this->assertEquals($requestQuery['exclude'], 'currently,daily');
    }

    /**
    * @covers WeatherRequest::queryAttach
    */
    public function testQueryAttach()
    {
        $weatherSubclass =
        $request = new WeatherAccesibleRequest(self::API_KEY, self::LAT, self::LONG);
        $requestQuery = self::getQuery($request);
        $this->assertEquals($requestQuery, []);

        $request->queryAttach(['key' => 'value']);
        $requestQuery = self::getQuery($request);
        $this->assertEquals($requestQuery, ['key' => 'value']);
    }

    /**
    * @covers WeatherRequest::getOptions
    */
    public function testGetOptions()
    {
        $request = new WeatherRequest(self::API_KEY, self::LAT, self::LONG);
        $request->attachExclude(['currently', 'daily']);
        $request->attachPrefs(['units' => 'si', 'lang' => 'el']);

        $exceptedOptions = ['query' => ['units' => 'si', 'lang' => 'el', 'exclude' => 'currenlty,daily']];
        $actualOptions = $request->getOptions();

        $this->assertEmpty(array_merge(array_diff($exceptedOptions, $actualOptions), array_diff($actualOptions, $exceptedOptions)));
    }


}


/**
 * Helper class to access protected method
 *
 */
Class WeatherAccesibleRequest extends WeatherRequest
{
    public function queryAttach(array $queryParams): void
    {
         parent::queryAttach($queryParams);
    }
}
