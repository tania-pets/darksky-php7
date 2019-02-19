<?php

namespace Taniapets\DarkSky\Client;

/**
 * Http client factory for returning the Http Client Class
 *
 * @param
 * @return    void
 * @author
 * @copyright
 */
Class ClientFactory
{

    public static function makeClient($baseUrl)
    {
        return new GuzzleClient($baseUrl);
    }

}
