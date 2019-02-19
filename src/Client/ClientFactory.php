<?php

namespace Taniapets\DarkSky\Client;

Class ClientFactory
{

    public static function makeClient($baseUrl)
    {
        return new GuzzleClient($baseUrl);
    }

}
