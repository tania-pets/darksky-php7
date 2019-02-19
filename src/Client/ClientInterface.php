<?php

namespace Taniapets\DarkSky\Client;


interface ClientInterface
{
    public function get($request);

    public function post($request);

}
