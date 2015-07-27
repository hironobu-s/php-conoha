<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class Image extends BaseResource
{
    /**
     * id
     *
     * @var string $id
     */
    protected $id;

    /**
     * links
     *
     * @var array $links
     */
    protected $links;

    /**
     * size
     *
     * @var int $size
     */
    protected $size;

    /**
     * created
     *
     * @var \DateTime $created
     */
    protected $created;

    /**
     * metadata
     *
     * @var array $metadata
     */
    protected $metadata;

    /**
     * minDisk
     *
     * @var int $minDisk
     */
    protected $minDisk;

    /**
     * minRam
     *
     * @var int $minRam
     */
    protected $minRam;

    /**
     * name
     *
     * @var string $name
     */
    protected $name;

    /**
     * progress
     *
     * @var int $progress
     */
    protected $progress;

    /**
     * status
     *
     * @var string $status
     */
    protected $status;

    /**
     * updated
     *
     * @var \DateTime $updated
     */
    protected $updated;



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

    /**
     * sizeのセット
     *
     * @param int size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * sizeの取得
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * createdのセット
     *
     * @param string created
     */
    public function setCreated($created)
    {
        if(is_string($created)) {
            $created = new \DateTime($created);
        }
        $this->created = $created;
    }

    /**
     * createdの取得
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * metadataのセット
     *
     * @param array metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * metadataの取得
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * minDiskのセット
     *
     * @param int minDisk
     */
    public function setMinDisk($minDisk)
    {
        $this->minDisk = $minDisk;
    }

    /**
     * minDiskの取得
     *
     * @return int
     */
    public function getMinDisk()
    {
        return $this->minDisk;
    }

    /**
     * minRamのセット
     *
     * @param int minRam
     */
    public function setMinRam($minRam)
    {
        $this->minRam = $minRam;
    }

    /**
     * minRamの取得
     *
     * @return int
     */
    public function getMinRam()
    {
        return $this->minRam;
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
     * progressのセット
     *
     * @param int progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
    }

    /**
     * progressの取得
     *
     * @return int
     */
    public function getProgress()
    {
        return $this->progress;
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
        if(is_string($updated)) {
            $updated = new \DateTime($updated);
        }
        $this->updated = $updated;
    }

    /**
     * updatedの取得
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    public function populate(\StdClass $json)
    {
        parent::populate($json);

        // links
        $links = [];
        foreach($json->links as $link) {
            $l = new Link();
            $l->populate($link);
            $links[] = $l;
        }
        $this->setLinks($links);
    }
}
