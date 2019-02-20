<?php

namespace Taniapets\DarkSky\Client;

use Taniapets\DarkSky\Requests\AbstractRequest;
/**
 * Interface for hhtp client
 */

interface ClientInterface
{
    public function get(AbstractRequest $request) : string;

    public function getConcurrent(array $requests) : array;

    public function post(AbstractRequest $request) : string;

}
