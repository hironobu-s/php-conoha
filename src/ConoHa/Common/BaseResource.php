<?php

namespace ConoHa\Common;

use ConoHa\Exception\StoreException;
use ConoHa\Common\BaseService;

abstract class BaseResource extends Object
{
    protected $service;
    public function __construct(BaseService $service = null)
    {
        $this->service = $service;
    }

    /**
     * オブジェクトのフォールドを埋める
     *
     * @param $res \StdClass JSONオブジェクト
     * @reutrn void
     * @throws \ConoHa\Exception\PopulateException
     */
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

    /**
     * リソースを永続化する
     *
     * リソースによって永続化が可能な場合(PUTメソッドをサポートしている)は
     * このメソッドをオーバーライドして実装する
     */
    public function store()
    {
        throw new \BadMethodCallException('The requested resource does not support store() method.');
    }
}
