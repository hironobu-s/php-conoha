<?php

namespace ConoHa\Resource;

use ConoHa\Common\Object;

class Token extends Object
{
    protected $properties = [
        'id' => null,
        'expires' => null,
        'issued_at' => null
    ];

    public function populate($mixed)
    {
        $this->setId($mixed->id);
        $this->setExpires($mixed->expires);
        $this->setIssuedAt($mixed->issued_at);

    }

    public function setExpires($expire)
    {
        if(is_string($expire)) {
            $expire = new \DateTime($expire, new \DateTimezone('UTC'));
        }
        $this->expires = $expire;
    }
}
