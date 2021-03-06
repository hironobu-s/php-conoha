<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;
use ConoHa\Common\BaseResource;
use ConoHa\Common\ResourceCollection;
use ConoHa\Identity\Resource\ServiceCatalog;
use ConoHa\Identity\Resource\Token;

class Access extends BaseResource
{
    private $catalog;
    private $token;

    public function getServiceCatalog()
    {
        return $this->service_catalog;
    }

    public function setServiceCatalog()
    {
        return $this->service_catalog;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken()
    {
        return $this->token;
    }

    public function populate(\StdClass $json)
    {
        $this->token = new Token();
        $this->token->populate($json->access->token);

        $r = new ServiceCatalog();
        $this->service_catalog = new ResourceCollection();
        $this->service_catalog->fill($r, $json->access->serviceCatalog);
    }

    public function getCatalogByType($type)
    {
        foreach($this->getServiceCatalog() as $catalog) {
            if($catalog->getType() == $type) {
                return $catalog;
            }
        }
        return null;
    }
}
