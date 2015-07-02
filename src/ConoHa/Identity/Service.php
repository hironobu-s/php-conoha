<?php

namespace ConoHa\Identity;

use Guzzle\Http\ClientInterface;
use ConoHa\Resource\Secret;
use ConoHa\Resource\Token;
use ConoHa\Common\ApiClient;
use ConoHa\Common\BaseService;

class Service extends BaseService
{
    protected $secret;

    public function tokens(Secret $secret)
    {
        // work
        $config = [
            'base_uri' => 'https://identity.tyo1.conoha.io',
        ];

        $c = new ApiClient($config);

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

        $res = $c->post('/v2.0/tokens', ['body' => $json, 'debug' => true]);
        $body = $res->getBody();
        $c = $body->getContents();
        $json = json_decode($c);

        if( !$c || !$json) {
            throw new Exception('ResponseError');
        }

        $token = new Token();
        $token->populate($json->access->token);

        return $token;
    }
}
