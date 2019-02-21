<?php
namespace Tests\Requests;

use Taniapets\DarkSky\Requests\TimeMachineRequest;
use Tests\RequestTest;

Class TimeMachineRequestTest extends RequestTest
{
    const TIMESTAMP = '1550601981';
    /**
    * @covers TimeMachineRequest::getPath
    */
    public function testGetPath()
    {
        $request = new TimeMachineRequest(self::API_KEY, self::LAT, self::LONG, self::TIMESTAMP);
        $this->assertEquals($request->getPath(), self::REQUEST_PATH . self::API_KEY . '/' . self::LAT . ',' . self::LONG . ',' . self::TIMESTAMP);
    }


}
