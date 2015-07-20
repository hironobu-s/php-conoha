<?php

namespace ConoHa\Common;

class ResourceCollection extends \ArrayIterator
{
    public function fill($class, array $items)
    {
        foreach($items as $json) {
            $r = clone $class;
            $r->populate($json);
            $this->append($r);
        }
    }
}
