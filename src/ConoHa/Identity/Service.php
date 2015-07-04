<?php

namespace ConoHa\Identity;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use ConoHa\Resource\Secret;
use ConoHa\Resource\Token;
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

        $token = new Token();
        $token->populate($res);

        return $token;
    }
}
