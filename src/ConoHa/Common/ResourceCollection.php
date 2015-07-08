<?php

namespace ConoHa\Common;

abstract class ResourceCollection extends \ArrayIterator
{
    abstract public function populate(\StdClass $res);
}
