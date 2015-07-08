<?php

namespace ConoHa\Common\Resource;

use ConoHa\Common\BaseResource;

class Version extends BaseResource
{
    protected $properties = [
        'id' => null,
        'status' => null,
        'updated' => null,
        'media_types' => [],
        'links' => [],
    ];

    public function populate(\StdClass $json)
    {
        // 上位がVersionsクラスの場合はこのプロパティは存在しないが、
        // Versionを単独でAPIを叩いた場合は存在する。
        if(isset($json->version)) {
            $json = $json->version;
        }

        $this->properties['id'] = $json->id;
        $this->properties['status'] = $json->status;
        $this->properties['updated'] = new \DateTime($json->updated);
        $this->properties['media_types'] = $json->{'media-types'};
        $this->properties['links'] = $json->links;
    }
}
