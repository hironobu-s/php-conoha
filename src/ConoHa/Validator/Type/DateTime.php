<?php

namespace ConoHa\Validator\Type;

use ConoHa\Validator\Type\BaseType;
use ConoHa\Exception\ValidatorException;

/**
 * 日付型パラメータ
 *
 * $valueは\DateTime型で渡す
 */
class DateTime extends BaseType
{
    /**
     * 値を検証する
     *
     * @param  mixed $value
     * @return mixed
     */
    public function validate($value)
    {
        if(! ($value instanceof \DateTime)) {
            throw new ValidatorException('The value of type should be DateTime.');
        }

        return parent::validate($value);
    }

    /**
     * 値をフォーマットする
     *
     * @param \DateTime $value
     * @return string
     */
    protected function format($value)
    {
        if(!($value instanceof \DateTime)) {
            return null;
        }
        return $value->format('c');
    }
}