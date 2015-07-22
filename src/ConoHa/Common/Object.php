<?php

namespace ConoHa\Common;

use ConoHa\Exception;

abstract class Object {
    // // Regions
    // const TYO1 = 1;
    // const SIN1 = 2;
    // const SJC1 = 3;

    // // Properties
    // protected $properties = [];

    // // auto setter and getter
    // private $init = false;
    // public function __call($name, $args)
    // {
    //     if( ! preg_match('/^(get|set)([A-Z].*)/', $name, $m)) {
    //         throw new \BadMethodCallException('Undefined method [' . $name . ']');
    //     }

    //     $sname = self::camel2Snake($m[2]);
    //     if(array_key_exists($sname, $this->properties)) {
    //         if($m[1] == 'get') {
    //             return $this->properties[$sname];
    //         } else {
    //             $this->properties[$sname] = $args[0];
    //         }
    //     } else {
    //         throw new \BadMethodCallException('Undefined method [' . $name . ']');
    //     }
}
