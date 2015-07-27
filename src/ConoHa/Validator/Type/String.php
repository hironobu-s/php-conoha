<?php

namespace ConoHa\Validator\Type;

use ConoHa\Validator\Type\BaseType;
use ConoHa\Exception\ValidatorException;

/**
 * 文字列パラメータ
 *
 * 現状、空文字はnullと同じ扱いとする
 */
class String extends BaseType
{
    /**
     * 値を検証する
     *
     * @param  mixed $value
     * @return void
     */
    public function validate($value)
    {
        parent::validate($value);

        if(!$this->getNullOk() && $value == '') {
            throw new ValidatorException('The value should not be blank.');
        }
    }
}
