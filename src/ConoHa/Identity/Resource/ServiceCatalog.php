<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Api\Response;
use ConoHa\Exception\PopulateException;

class ServiceCatalog extends BaseResource
{
    /**
     * endpoints
     *
     * @var array $endpoints
     */
    private $endpoints;

    /**
     * endpoint_links
     *
     * @var array $endpoint_links
     */
    private $endpoint_links;

    /**
     * name
     *
     * @var string $name
     */
    private $name;

    /**
     * type
     *
     * @var string $type
     */
    private $type;


    /**
     * endpointsのセット
     *
     * @param array endpoints
     */
    public function setEndpoints(array $endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * endpointsの取得
     *
     * @return array
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * endpoint_linksのセット
     *
     * @param array endpoint_links
     */
    public function setEndpointLinks(array $endpoint_links)
    {
        $this->endpoint_links = $endpoint_links;
    }

    /**
     * endpoint_linksの取得
     *
     * @return array
     */
    public function getEndpointLinks()
    {
        return $this->endpoint_links;
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
     * populateのオーバーライド
     *
     * @param \StdClass $json
     */
    public function populate(\StdClass $json)
    {
        $this->setType($json->type);
        $this->setName($json->name);

        $endpoints = [];
        foreach($json->endpoints as $endpoint) {
            $e = new Endpoint();
            $e->setPublicUrl($endpoint->publicURL);
            $e->setRegion($endpoint->region);
            $endpoints[] = $e;
        }
        $this->setEndpoints($endpoints);
        $this->setEndpointLinks([]);
    }
}
