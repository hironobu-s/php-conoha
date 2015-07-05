<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\Object;
use ConoHa\Identity\Resource\ServiceCatalog;
use ConoHa\Identity\Resource\Token;

class Access extends Object
{
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

        $this->service_catalog = new ServiceCatalog();
        $this->service_catalog->populate($json);
    }
}
