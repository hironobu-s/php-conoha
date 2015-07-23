<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;
use ConoHa\Exception\IncorrectUrlException;

class Secret extends Object
{
    /**
     * username
     *
     * @var string $username
     */
    private $username;

    /**
     * password
     *
     * @var string $password
     */
    private $password;

    /**
     * tenant_name
     *
     * @var string $tenant_name
     */
    private $tenant_name;

    /**
     * tenant_id
     *
     * @var string $tenant_id
     */
    private $tenant_id;

    /**
     * auth_url
     *
     * @var string $auth_url
     */
    private $auth_url;

    /**
     * region
     *
     * @var string $region
     */
    private $region;



    /**
     * usernameのセット
     *
     * @param string username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * usernameの取得
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * passwordのセット
     *
     * @param string password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * passwordの取得
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * tenant_nameのセット
     *
     * @param string tenant_name
     */
    public function setTenantName($tenant_name)
    {
        $this->tenant_name = $tenant_name;
    }

    /**
     * tenant_nameの取得
     *
     * @return string
     */
    public function getTenantName()
    {
        return $this->tenant_name;
    }

    /**
     * tenant_idのセット
     *
     * @param string tenant_id
     */
    public function setTenantId($tenant_id)
    {
        $this->tenant_id = $tenant_id;
    }

    /**
     * tenant_idの取得
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenant_id;
    }


    /**
     * auth_urlのセット
     *
     * @param string tenant_id
     */
    public function setAuthUrl($url)
    {
        $this->auth_url = $url;
    }

    /**
     * auth_urlの取得
     *
     * @return string
     */
    public function getAuthUrl()
    {
        return $this->auth_url;
    }

    /**
     * regionのセット
     *
     * @param string region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * regionの取得
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }


}
