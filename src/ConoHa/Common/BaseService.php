<?php

namespace ConoHa\Common;

use ConoHa\Common\ApiClient;
use ConoHa\Resource\Token;

class BaseService extends Object{

    protected $client;
    protected $token;

    public function __construct() {
        $this->client = new ApiClient();
    }

    public function setToken(Token $token) {
        $this->token = $token;
    }

    // public function getToken() {
    //     if( ! $this->token) {
    //         $this->token = $this->tokens();
    //     }

    //     return $this->token;
    // }

    // public function setApiClient(ApiClient　$client) {
    // }

    public function getApiClient() {
        return $this->client;
    }
}
