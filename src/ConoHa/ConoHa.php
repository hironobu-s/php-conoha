<?php

namespace ConoHa;

use ConoHa\Common\Object;
use ConoHa\Identity\Resource\Secret;
use ConoHa\Identity\Resource\Access;
use ConoHa\Identity\Service as IdentityService;
use ConoHa\Account\Service as AccountService;
use ConoHa\Exception\ServiceNotFoundException;

class ConoHa extends Object
{
    private $access;
    private $identity_endpoint;
    public function __construct()
    {
    }

    public function auth(Secret $secret)
    {
        $endpoint = $secret->getAuthUrl();

        $ident = $this->getIdentityService($endpoint);
        $this->access = $ident->tokens($secret);

        return $this->access;
    }

    public function setAccess(Access $access)
    {
        $this->access = $access;
    }

    public function getIdentityService($endpoint = null)
    {
        if($this->access instanceof Access) {
            $s = new IdentityService($endpoint);
            $s->setToken($this->access->getToken());

        } else if($endpoint != null) {
            $s = new IdentityService($endpoint);

        } else {
            throw new InvalidArgumentException('The endpoint url is required if auth() method does not called.');
        }

        return $s;
    }

    public function getAccountService()
    {
        if(!($this->access instanceof Access)) {
            throw new \InvalidArgumentException('The endpoint url is required if auth() method does not called.');
        }

        $catalog = $this->access->getCatalogByType('account');
        if(!$catalog) {
            throw new ServiceNotFoundException('Catalog type "account" is not found in this system.');
        }

        $endpoint = $catalog->getEndpoints()[0]->getPublicUrl();

        $s = new AccountService($endpoint);
        $s->setToken($this->access->getToken());

        return $s;
    }
}
