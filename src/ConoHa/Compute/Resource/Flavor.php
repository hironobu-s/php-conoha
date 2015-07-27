<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class Flavor extends BaseResource
{
    /**
     * id
     *
     * @var string $id
     */
    protected $id;

    /**
     * name
     *
     * @var string $name
     */
    protected $name;

    /**
     * os_flv_disabled_disabled
     *
     * @var string $os_flv_disabled
     */
    protected $os_flv_disabled;

    /**
     * os_flv_data_ephemeral
     *
     * @var int $os_flv_data_ephemeral
     */
    protected $os_flv_data_ephemeral;

    /**
     * disk
     *
     * @var int $disk
     */
    protected $disk;

    /**
     * os_flavor_access_is_public
     *
     * @var bool $os_flavor_access_is_public
     */
    protected $os_flavor_access_is_public;

    /**
     * ram
     *
     * @var int $ram
     */
    protected $ram;

    /**
     * rxtx_factor
     *
     * @var int $rxtx_factor
     */
    protected $rxtx_factor;

    /**
     * swap
     *
     * @var int $swap
     */
    protected $swap;

    /**
     * vcpus
     *
     * @var int $vcpus
     */
    protected $vcpus;



    /**
     * idのセット
     *
     * @param string id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * idの取得
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * nameのセット
     *
     * @param string name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * nameの取得
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * os_flv_disabledのセット
     *
     * @param string os_flv_disabled
     */
    public function setOsFlvDisabled($os_flv_disabled)
    {
        $this->os_flv_disabled = $os_flv_disabled;
    }

    /**
     * os_flv_disabledの取得
     *
     * @return string
     */
    public function getOsFlvDisabled()
    {
        return $this->os_flv_disabled;
    }

    /**
     * os_flv_data_ephemeralのセット
     *
     * @param int os_flv_data_ephemeral
     */
    public function setOsFlvDataEphemeral($os_flv_data_ephemeral)
    {
        $this->os_flv_data_ephemeral = $os_flv_data_ephemeral;
    }

    /**
     * os_flv_data_ephemeralの取得
     *
     * @return int
     */
    public function getOsFlvDataEphemeral()
    {
        return $this->os_flv_data_ephemeral;
    }

    /**
     * diskのセット
     *
     * @param int disk
     */
    public function setDisk($disk)
    {
        $this->disk = $disk;
    }

    /**
     * diskの取得
     *
     * @return int
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * os_flavor_access_is_publicのセット
     *
     * @param bool os_flavor_access_is_public
     */
    public function setOsFlavorAccessIsPublic($os_flavor_access_is_public)
    {
        $this->os_flavor_access_is_public = $os_flavor_access_is_public;
    }

    /**
     * os_flavor_access_is_publicの取得
     *
     * @return bool
     */
    public function getOsFlavorAccessIsPublic()
    {
        return $this->os_flavor_access_is_public;
    }

    /**
     * ramのセット
     *
     * @param int ram
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
    }

    /**
     * ramの取得
     *
     * @return int
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * rxtx_factorのセット
     *
     * @param int rxtx_factor
     */
    public function setRxtxFactor($rxtx_factor)
    {
        $this->rxtx_factor = $rxtx_factor;
    }

    /**
     * rxtx_factorの取得
     *
     * @return int
     */
    public function getRxtxFactor()
    {
        return $this->rxtx_factor;
    }

    /**
     * swapのセット
     *
     * @param int swap
     */
    public function setSwap($swap)
    {
        $this->swap = $swap;
    }

    /**
     * swapの取得
     *
     * @return int
     */
    public function getSwap()
    {
        return $this->swap;
    }

    /**
     * vcpusのセット
     *
     * @param int vcpus
     */
    public function setVcpus($vcpus)
    {
        $this->vcpus = $vcpus;
    }

    /**
     * vcpusの取得
     *
     * @return int
     */
    public function getVcpus()
    {
        return $this->vcpus;
    }


    /**
     * Linkのセット
     *
     * @param array
     */
    public function setLinks(array $links)
    {
        $this->links = $links;
    }

    /**
     * Linkの取得
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function populate(\StdClass $json)
    {
        $this->setId($json->id);
        $this->setName($json->name);
        if(isset($json->{"OS-FLV-DISABLED:disabled"})) {
            $this->setOsFlvDisabled($json->{"OS-FLV-DISABLED:disabled"});
        }

        if(isset($json->ram)) {
            $this->setRam($json->ram);
        }
        if(isset($json->vcpus)) {
            $this->setVcpus($json->vcpus);
        }
        if(isset($json->swap)) {
            $this->setSwap($json->swap);
        }
        if(isset($json->{"os-flavor-access:is_public"})) {
            $this->setOsFlavorAccessIsPublic($json->{"os-flavor-access:is_public"});
        }
        if(isset($json->rxtx_factor)) {
            $this->setRxtxFactor($json->rxtx_factor);
        }
        if(isset($json->{"OS-FLV-EXT-DATA:ephemeral"})) {
            $this->setOsFlvDataEphemeral($json->{"OS-FLV-EXT-DATA:ephemeral"});
        }
        if(isset($json->disk)) {
            $this->setDisk($json->disk);
        }

        $links = [];
        foreach($json->links as $l) {
            $link = new FlavorLink();
            $link->populate($l);
            $links[] = $link;
        }
        $this->setLinks($links);
    }
}
