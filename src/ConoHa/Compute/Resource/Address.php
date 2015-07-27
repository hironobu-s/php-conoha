<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class Address extends BaseResource
{
    /**
     * mac_addr
     *
     * @var string $mac_addr
     */
    protected $mac_addr;

    /**
     * type
     *
     * @var string $type
     */
    protected $type;

    /**
     * addr
     *
     * @var string $addr
     */
    protected $addr;

    /**
     * version
     *
     * @var int $version
     */
    protected $version;



    /**
     * mac_addrのセット
     *
     * @param string mac_addr
     */
    public function setMacAddr($mac_addr)
    {
        $this->mac_addr = $mac_addr;
    }

    /**
     * mac_addrの取得
     *
     * @return string
     */
    public function getMacAddr()
    {
        return $this->mac_addr;
    }

    /**
     * typeのセット
     *
     * @param string type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * typeの取得
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * addrのセット
     *
     * @param string addr
     */
    public function setAddr($addr)
    {
        $this->addr = $addr;
    }

    /**
     * addrの取得
     *
     * @return string
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * versionのセット
     *
     * @param int version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * versionの取得
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }
}
