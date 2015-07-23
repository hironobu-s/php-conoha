<?php

namespace ConoHa\Common;

use ConoHa\Api\Client;
use ConoHa\Identity\Resource\Token;
use ConoHa\Common\Resource\Versions;
use ConoHa\Common\Resource\Version;

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
        if($this->token instanceof Token) {
            $client->setApiToken($this->token->getId());
        }

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

    public function getUri($path = null, array $query = [])
    {
        $endpoint = $this->getEndpoint();
        if(is_array($path)) {
            $endpoint .= '/' . join('/', $path);
        } else if($path) {
            $endpoint .= '/' . $path;
        }

        if(isset($query)) {
            $endpoint .= '?' . http_build_query($query);
        }

        return $endpoint;
    }

    public function getVersions()
    {
        $res = $this->getClient()->get($this->getUri());

        $v = new Version();
        $collection = new ResourceCollection();
        $collection->fill($v, $res->getJson()->versions->values);
        return $collection;
    }

    public function getVersion($version)
    {
        $res = $this->getClient()->get($this->getUri($version));

        $v = new Version();
        $v->populate($res->getJson());
        return $v;
    }

    public function getStableVersion()
    {
        $version = null;
        $versions = $this->getVersions();
        foreach($versions as $v) {
            if($v->getStatus() == 'stable') {
                $version = $v;
            }
        }
        return $version;
    }
}
