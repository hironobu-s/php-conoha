<?php

namespace ConoHa\Common;

use ConoHa\Exception;

abstract class Object {
    // Regions
    const TYO1 = 1;
    const SIN1 = 2;
    const SJC1 = 3;

    // Properties
    protected $properties = [];

    public function __call($name, $args) {
        if( ! preg_match('/^(get|set)([A-Z].*)/', $name, $m)) {
            throw new \BadMethodCallException('Undefined method [' . $name . ']');
        }

        $sname = self::camel2Snake($m[2]);
        if(array_key_exists($sname, $this->properties)) {
            if($m[1] == 'get') {
                return $this->properties[$sname];
            } else {
                $this->properties[$sname] = $args[0];
            }
        } else {
            throw new \BadMethodCallException('Undefined method [' . $name . ']');
        }
    }

    public function populate($mixed)
    {
        if( ! is_array($mixed)) {
            throw new InvalidArgumentException('The argument cannot be array access.');
        }

        foreach($mixed as $name => $value) {
            $method = 'set' . self::snake2Camel($name);
            $this->{$method}($value);
        }
    }

    public static function snake2Camel($name) {
        $name = nametr($name, '_', ' ');
        $name = ucwords($name);
        return str_replace(' ', '', $name);
    }

    public static function camel2Snake($name) {
        $name = preg_replace('/[A-Z]/', '_\0', $name);
        $name = strtolower($name);
        return ltrim($name, '_');
    }
}
