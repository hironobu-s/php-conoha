<?php

namespace ConoHa\Common;

use ConoHa\Exception\StoreException;
use ConoHa\Common\BaseService;

abstract class BaseResource extends Object
{
    /**
     * オブジェクトのフィールドを埋める
     *
     * @param $res \StdClass JSONオブジェクト
     * @reutrn void
     * @throws \ConoHa\Exception\PopulateException
     */
    public function populate(\StdClass $res)
    {
        foreach($res as $name => $value) {
            if(preg_match('/:([^:]+)/', $name, $m)) {
                $name = $m[1];
            }
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
