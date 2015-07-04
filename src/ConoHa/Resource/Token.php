<?php

namespace ConoHa\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Api\Response;
use ConoHa\Exception\PopulateException;

class Token extends BaseResource
{
    protected $properties = [
        'id'        => null,
        'expires'   => null,
        'issued_at' => null,
    ];

    public function populate(Response $res)
    {
        $json = $res->getJson();
        if( ! $json) {
            throw new PopulateException("Could't populate with the response data.");
        }

        $this->setId($json->access->token->id);
        $this->setExpires($json->access->token->expires);
        $this->setIssuedAt($json->access->token->issued_at);
    }

    public function setExpires($expire)
    {
        if(is_string($expire)) {
            $expire = new \DateTime($expire, new \DateTimezone('UTC'));
        }
        $this->properties['expires'] = $expire;
    }
}
