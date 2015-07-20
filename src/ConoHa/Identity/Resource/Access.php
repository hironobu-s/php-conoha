<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;
use ConoHa\Common\ResourceCollection;
use ConoHa\Identity\Resource\ServiceCatalog;
use ConoHa\Identity\Resource\Token;

class Access extends Object
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
        $this->token->populate($json);

        $r = new ServiceCatalog();
        $this->service_catalog = new ResourceCollection();
        $this->service_catalog->fill($r, $json->access->serviceCatalog);
    }
}
