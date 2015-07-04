<?php

namespace ConoHa\Common;

use ConoHa\Api\Response;

abstract class BaseResource extends Object
{
    abstract public function populate(Response $res);
}
