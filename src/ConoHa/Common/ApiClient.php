<?php

namespace ConoHa\Common;

use GuzzleHttp\Client;
use Guzzle\Http\Util;

class ApiClient extends Client {

    private $url;

    public function __construct($config = []) {
        parent::__construct($config);
    }

    public function getDefaultUserAgent() {
        return "PHP-ConoHa API Client";
    }
}
