<?php

namespace ConoHa\Identity;

use ConoHa\Identity\Resource\Secret;
use ConoHa\Identity\Resource\Access;
use ConoHa\Common\ApiClient;
use ConoHa\Common\BaseService;

class Service extends BaseService
{
    protected $secret;

    public function tokens(Secret $secret)
    {
        $auth = [
            'auth' => [
                'passwordCredentials' => [
                    'username' => $secret->getUsername(),
                    'password' => $secret->getPassword(),
                ],
                'tenantName' => $secret->getTenantName(),
            ],
        ];
        $json = json_encode($auth);

        $res = $this->getClient()->post($this->getUri('tokens'), [
            'body' => $json,
            'debug' => false
        ]);

        $access = new Access();
        $access->populate($res->getJson());

        return $access;
    }
}
