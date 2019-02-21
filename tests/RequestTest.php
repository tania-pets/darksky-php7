<?php
namespace Tests;

use PHPUnit\Framework\TestCase;


/**
 * Base class for requests tests
 */
abstract Class RequestTest extends TestCase
{

    const LAT = 40.6211912;
    const LONG = 22.9285177;
    const REQUEST_PATH = 'forecast/';
    const API_KEY = 'dummy_key';


    protected static function getQuery($request)
    {
        return $request->getOptions()['query'] ?? null;
    }



}
