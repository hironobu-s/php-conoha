<?php

namespace ConoHa\Common\Resource;

use ConoHa\Common\BaseResource;

class Version extends BaseResource
{
    /**
     * id
     *
     * @var string $id
     */
    private $id;

    /**
     * status
     *
     * @var string $status
     */
    private $status;

    /**
     * updated
     *
     * @var string $updated
     */
    private $updated;

    /**
     * media_types
     *
     * @var array $media_types
     */
    private $media_types;

    /**
     * links
     *
     * @var array $links
     */
    private $links;



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
     * statusのセット
     *
     * @param string status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * statusの取得
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * updatedのセット
     *
     * @param string updated
     */
    public function setUpdated($updated)
    {
        $this->updated = new \DateTime($updated);
    }

    /**
     * updatedの取得
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * media_typesのセット
     *
     * @param array media_types
     */
    public function setMediaTypes($media_types)
    {
        $this->media_types = $media_types;
    }

    /**
     * media_typesの取得
     *
     * @return array
     */
    public function getMediaTypes()
    {
        return $this->media_types;
    }

    /**
     * linksのセット
     *
     * @param array links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * linksの取得
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }
}
