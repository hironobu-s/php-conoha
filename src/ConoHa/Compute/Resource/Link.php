<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class Link extends BaseResource
{

    /**
     * href
     *
     * @var string $href
     */
    protected $href;

    /**
     * rel
     *
     * @var string $rel
     */
    protected $rel;



    /**
     * hrefのセット
     *
     * @param string href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * hrefの取得
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * relのセット
     *
     * @param string rel
     */
    public function setRel($rel)
    {
        $this->rel = $rel;
    }

    /**
     * relの取得
     *
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

}
