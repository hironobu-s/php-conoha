<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Api\Response;

class ServiceCatalog extends BaseResource
{
    protected $properties = [
        'endpoints' => null,
        'name'      => null,
        'type'      => null,
    ];

    public function populate(\StdClass $json)
    {
        if(!isset($json->access->serviceCatalog)) {
           throw new PopulateException("Object does not has a property. [serviceCatalog]");
        }

        foreach($json->access->serviceCatalog as $catalog) {
            $this->setType($catalog->type);
            $this->setName($catalog->name);

            $endpoints = [];
            foreach($catalog->endpoints as $endpoint) {
                $e = new Endpoint();
                $e->setPublicUrl($endpoint->publicURL);
                $e->setRegion($endpoint->region);
                $endpoints[] = $e;
            }
            $this->setEndpoints($endpoints);
        }
    }
}
