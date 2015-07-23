<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class Flavor extends BaseResource
{

    /**
     * id
     *
     * @var int $id
     */
    protected $id;

    /**
     * links
     *
     * @var array $links
     */
    protected $links;

    /**
     * name
     *
     * @var string $name
     */
    protected $name;



    /**
     * idのセット
     *
     * @param int id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * idの取得
     *
     * @return int
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
    public function setLinks(array $links)
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

    public function populate(\StdClass $json)
    {
        $this->setId($json->id);
        $this->setName($json->name);

        $links = [];
        foreach($json->links as $l) {
            $link = new FlavorLink();
            $link->populate($l);
            $links[] = $link;
        }
        $this->setLinks($links);
    }
}
