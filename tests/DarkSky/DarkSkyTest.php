<?php

namespace Darksky;

use PHPUnit\Framework\TestCase;
use Taniapets\DarkSky\DarkSky;
use Taniapets\DarkSky\Requests\{TimeMachineRequest,ForecastRequest};

Class DarkSkyTest extends TestCase
{

    const LAT = 40.6211912;
    CONST LONG = 22.9285177;

    public function testNewDarkSky()
    {
        $darkSky = new DarkSky('testKey');
        $this->assertInstanceOf(DarkSky::class, $darkSky);

        $darkSky = new DarkSky('testKey', ['units'=>'si', 'lang'=>'en']);
        $this->assertInstanceOf(DarkSky::class, $darkSky);
    }

    public function testSetUnits()
    {
        //test without having set units int the constructor
        $darkSky = new DarkSky('testKey');
        $that = $this;
        $assertUnit = function ()  use ($that){
           $that->assertEquals('si', $this->prefs['units']);
       };
       $doAssert = $assertUnit->bindTo($darkSky, get_class($darkSky));
       // Act
       $darkSky->setUnits('si');
       // Assert
       $doAssert();

       //test after having set unints in the constructor
       $darkSky = new DarkSky('testKey', ['units' => 'uk2']);
       $that = $this;
       $assertUnit = function ()  use ($that){
          $that->assertEquals('si', $this->prefs['units']);
       };
       $doAssert = $assertUnit->bindTo($darkSky, get_class($darkSky));
       // Act
       $darkSky->setUnits('si');
       // Assert
       $doAssert();

    }


    public function testSetLang()
    {
        //test without having set lang int the constructor
        $darkSky = new DarkSky('testKey');
        $that = $this;
        $assertLang = function ()  use ($that){
           $that->assertEquals('de', $this->prefs['lang']);
       };
       $doAssert = $assertLang->bindTo($darkSky, get_class($darkSky));
       // Act
       $darkSky->setLang('de');
       // Assert
       $doAssert();

       //test after having set lang in the constructor
       $darkSky = new DarkSky('testKey', ['lang' => 'el']);
       $that = $this;
       $assertLang = function ()  use ($that){
          $that->assertEquals('de', $this->prefs['lang']);
       };
       $doAssert = $assertLang->bindTo($darkSky, get_class($darkSky));
       // Act
       $darkSky->setLang('de');
       // Assert
       $doAssert();

    }

}
