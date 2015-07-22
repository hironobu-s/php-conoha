<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;

class Endpoint extends Object
{
    /**
     * region
     *
     * @var string $region
     */
    protected $region;

    /**
     * public_url
     *
     * @var string $public_url
     */
    protected $public_url;



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

    /**
     * public_urlのセット
     *
     * @param string public_url
     */
    public function setPublicUrl($public_url)
    {
        $this->public_url = $public_url;
    }

    /**
     * public_urlの取得
     *
     * @return string
     */
    public function getPublicUrl()
    {
        return $this->public_url;
    }

}
