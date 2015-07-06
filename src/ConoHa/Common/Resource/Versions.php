<?php

namespace ConoHa\Common\Resource;

use ConoHa\Common\Resource\Version;
use ConoHa\Common\ResourceCollection;

class Versions extends ResourceCollection
{
    public function populate(\StdClass $json)
    {
        foreach($json->versions->values as $obj) {
            $v = new Version;
            $v->populate($obj);
            $this->append($v);
        }
    }
}
