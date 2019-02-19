<?php

namespace Darksky;

use PHPUnit\Framework\TestCase;
use Taniapets\DarkSky\DarkSky;

Class DarkSkyTest extends TestCase
{
    public function testNewDarkSky()
    {
        $darkSky = new DarkSky('testKey');
        $this->assertInstanceOf(DarkSky::class, $darkSky);
    }

}
