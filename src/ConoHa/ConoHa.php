<?php

namespace ConoHa;

use ConoHa\Common\Object;
use ConoHa\Resource\Secret;
use ConoHa\Identity\Service as IdentityService;

class ConoHa extends Object {

    private $token;

    public function __construct()
    {

    }

    public function auth(Secret $secret)
    {
        $ident = new IdentityService();
        $this->token = $ident->tokens($secret);
        return true;
    }

    public function setToken(Token $token)
    {
        $this->token = $token;
    }

    public function getIdentityService()
    {
        $s = new IdentityService();
        $s->setToken($this->token);
        return $s;
    }
}
