<?php

namespace ConoHa\Validator\Type;

use ConoHa\Validator\Type\BaseType;
use ConoHa\Exception\ValidatorException;

class Integer extends BaseType
{
    /**
     * 値を検証する
     *
     * @param  mixed $value
     * @return integer
     */
    public function validate($value)
    {
        $val = parent::validate($value);

        if(!is_null($value) && !is_numeric($value)) {
            throw new ValidatorException('The value should be integer.');
        }

        return $val;
    }

    /**
     * 値をフォーマットする
     *
     * @param mixed $value
     * @return int
     */
    protected function format($value)
    {
        return intval($value);
    }
}
