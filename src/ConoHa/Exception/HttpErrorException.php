<?php

namespace ConoHa\Exception;

use ConoHa\Api\Response;

class HttpErrorException extends \LogicException
{
    private $response;
    public function setLastResponse(Response $res)
    {
        $this->response = $res;
    }

    public function getLastResponse()
    {
        return $this->response;
    }
}
