<?php

namespace ConoHa\Common;

use ConoHa\Api\Client;
use ConoHa\Identity\Resource\Token;
use ConoHa\Common\Resource\Versions;

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

    public function getVersions()
    {
        $res = $this->getClient()->get($this->getUri());

        $v = new Versions();
        $v->populate($res->getJson());
        return $v;
    }
}
