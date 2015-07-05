<?php

namespace ConoHa;

use ConoHa\Common\Object;
use ConoHa\Identity\Resource\Secret;
use ConoHa\Identity\Resource\Token;
use ConoHa\Identity\Service as IdentityService;

class ConoHa extends Object {

    private $token;
    private $identity_endpoint;
    public function __construct($identity_endpoint)
    {
        $this->identity_endpoint = $identity_endpoint;
    }

    public function auth(Secret $secret)
    {
        $ident = $this->getIdentityService();
        $this->token = $ident->tokens($secret);

        return true;
    }

    public function getIdentityService()
    {
        $s = new IdentityService($this->identity_endpoint);
        if($this->token instanceof Token) {
            $s->setToken($this->token);
        }
        return $s;
    }
}
