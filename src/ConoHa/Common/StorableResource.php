<?php

namespace ConoHa\Common;

use ConoHa\Common\BaseResource;

/**
 * リソースの永続化(PUTメソッド)をサポートしたリソースオブジェクト
 */
class StorableResource extends BaseResource
{
    protected $service;
    public function __construct(BaseService $service)
    {
        $this->service = $service;
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
