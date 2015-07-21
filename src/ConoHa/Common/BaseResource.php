<?php

namespace ConoHa\Common;

abstract class BaseResource extends Object
{
    public function populate(\StdClass $res)
    {
        foreach($this->properties as $name => $nouse) {
            $method = "set" . self::snake2Camel($name);
            $this->{$method}($res->{$name});
        }
    }
}
