<?php

namespace ConoHa\Common;

use ConoHa\Api\Client;
use ConoHa\Resource\Token;

abstract class BaseService extends Object
{
    protected $token;

    public function __construct($endpoint)
    {
        $this->setEndpoint($endpoint);
    }

    public function setToken(Token $token)
    {
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

    public function getClient()
    {
        $client = new Client(['http_errors' => false]);
        return $client;
        // $stack = new HandlerStack();
        // $stack->setHandler(new CurlHandler());
        // $stack->push(
    }

    protected $endpoint;
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getUri($path = null)
    {
        $endpoint = $this->getEndpoint();
        if($path) {
            $endpoint .= '/' . $path;
        }
        return $endpoint;
    }

}
