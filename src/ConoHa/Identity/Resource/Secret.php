<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;
use ConoHa\Exception\IncorrectUrlException;

class Secret extends Object
{
    protected $properties = [
        'username'    => null,
        'password'    => null,
        'tenant_name' => null,
        'tenant_id'   => null,
        'auth_url'    => null,
        'region'      => null,
    ];

    public function setAuthUrl($url)
    {
        // Endpoint URLのパス部分(バージョンなど)を削除
        // バージョンは getVersion() で内部的に取得するので不要
        $info = parse_url($url);

        if(isset($info['scheme'])) {
            $scheme = $info['scheme'];
        } else {
            // 省略された場合はhttpsを決め打ち
            $scheme = 'https';
        }

        if(isset($info['host'])) {
            $endpoint_url = sprintf('%s://%s', $scheme, $info['host']);
        } else {
            throw new IncorrectUrlException("URL format is incorrect[$url].");
        }

        $this->properties['auth_url'] = $endpoint_url;
    }

    // protected $username;
    // protected $password;
    // protected $tenant_name;
    // protected $tenant_id;
    // protected $auth_url;
    // protected $region;
    // protected $token;

    // public function setUsername($name)
    // {
    //     $this->username = $name;
    // }

    // public function getUsername()
    // {
    //     return $this->username;
    // }

    // public function setPassword($pass)
    // {
    //     $this->password = $pass;
    // }

    // public function getPassword()
    // {
    //     return $this->password;
    // }

    // public function setTenantName($name)
    // {
    //     $this->tenant_name = $name;
    // }

    // public function getTenantName()
    // {
    //     return $this->tenant_name;
    // }

    // public function setTenantId($id)
    // {
    //     $this->tenant_id = $id;
    // }

    // public function getTenantId()
    // {
    //     return $this->tenant_id;
    // }

    // public function setRegion($pass)
    // {
    //     $this->region = $pass;
    // }

    // public function getRegion()
    // {
    //     return $this->region;
    // }

    // public function setToken($pass)
    // {
    //     $this->token = $pass;
    // }

    // public function getToken()
    // {
    //     return $this->token;
    // }
}
