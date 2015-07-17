<?php

namespace ConoHa\Identity;

use ConoHa\Identity\Resource\Secret;
use ConoHa\Identity\Resource\Access;
use ConoHa\Common\ApiClient;
use ConoHa\Common\BaseService;
use ConoHa\Exception\ServiceNotFoundException;

class Service extends BaseService
{
    protected $secret;

    public function tokens(Secret $secret)
    {
        $version = $this->getStableVersion();
        if(!$version) {
            throw new ServiceNotFoundException('Stable version identity service is not found.');
        }

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

        $res = $this->getClient()->post($this->getUri([$version->getId(), 'tokens']), [
            'body' => $json,
        ]);

        $access = new Access();
        $access->populate($res->getJson());

        return $access;
    }
}
