<?php

namespace ConoHa\Common;

abstract class BaseResource extends Object
{
    abstract public function populate(\StdClass $res);
}
