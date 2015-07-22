<?php

namespace ConoHa\Common;

abstract class BaseResource extends Object
{
    public function populate(\StdClass $res)
    {
        foreach($res as $name => $value) {
            $method = "set" . self::snake2Camel($name);
            if(method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }
    }

    public static function snake2Camel($name)
    {
        $name = strtr($name, '_', ' ');
        $name = ucwords($name);
        return str_replace(' ', '', $name);
    }

    public static function camel2Snake($name)
    {
        $name = preg_replace('/[A-Z]/', '_\0', $name);
        $name = strtolower($name);
        return ltrim($name, '_');
    }
}
