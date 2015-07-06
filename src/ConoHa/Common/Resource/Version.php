<?php

namespace ConoHa\Common\Resource;

use ConoHa\Common\BaseResource;

class Version extends BaseResource
{
    protected $properties = [
        'id' => null,
        'status' => null,
        'updated' => null,
        'media-types' => [],
        'links' => [],
    ];

    public function populate(\StdClass $json)
    {
        $this->properties['id'] = $json->id;
        $this->properties['status'] = $json->status;
        $this->properties['updated'] = $json->updated;
        $this->properties['media-types'] = $json->{'media-types'};
        $this->properties['links'] = $json->links;
    }
}
