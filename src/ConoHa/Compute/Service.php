<?php

namespace ConoHa\Compute;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Compute\Resource\Flavor;

class Service extends BaseService
{
    public function flavors(
        $minDisk = null,
        $minRam  = null,
        $marker  = null,
        $limit   = null
    ) {
        $res = $this->getClient()->get($this->getUri('flavors'));

        $col = new ResourceCollection();
        $item = new Flavor();

        $col->fill($item, $res->getJson()->flavors);
        return $col;
    }
}
