<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Api\Response;
use ConoHa\Exception\PopulateException;

class ServiceCatalog extends BaseResource
{
    protected $properties = [
        'endpoints'       => null,
        'endpoint_links' => null,
        'name'            => null,
        'type'            => null,
    ];

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
