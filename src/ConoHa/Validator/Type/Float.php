<?php

namespace ConoHa\Validator\Type;

use ConoHa\Validator\Type\BaseType;
use ConoHa\Exception\ValidatorException;

class Float extends BaseType
{
    /**
     * 値を検証する
     *
     * @param  mixed $value
     * @return float
     */
    public function validate($value)
    {
        $val = parent::validate($value);

        if(!is_null($value) && !is_float($value)) {
            throw new ValidatorException('The value should be float.');
        }

        return $val;
    }

    /**
     * 値をフォーマットする
     *
     * @param mixed $value
     * @return float
     */
    protected function format($value)
    {
        return floatval($value);
    }
}
