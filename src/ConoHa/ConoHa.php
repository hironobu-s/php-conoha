<?php

namespace ConoHa;

use ConoHa\Common\Object;
use ConoHa\Identity\Resource\Secret;
use ConoHa\Identity\Resource\Access;
use ConoHa\Identity\Service as IdentityService;

class ConoHa extends Object {

    private $access;
    private $identity_endpoint;
    public function __construct($identity_endpoint)
    {
        $this->identity_endpoint = $identity_endpoint;
    }

    public function auth(Secret $secret)
    {
        $ident = $this->getIdentityService();
        $this->access = $ident->tokens($secret);

        return $this->access;
    }

    public function getIdentityService()
    {
        $s = new IdentityService($this->identity_endpoint);
        if($this->access instanceof Access) {
            $s->setToken($this->access->getToken());
        }
        return $s;
    }
}
