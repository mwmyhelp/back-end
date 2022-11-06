<?php

namespace App;
use GuzzleHttp\Client;
use Aws\Handler\GuzzleV6\GuzzleHandler as BaseAwsGuzzleHandler;

class GuzzleHandler extends BaseAwsGuzzleHandler
{
    public function __construct()
    {
        parent::__construct(new Client(
            ['verify' => false]
        ));
    }
}
