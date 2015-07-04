<?php

namespace ConoHa\Resource;

use ConoHa\Common\Object;

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
