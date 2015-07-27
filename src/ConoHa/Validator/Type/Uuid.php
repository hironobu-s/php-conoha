<?php

namespace ConoHa\Validator\Type;

use ConoHa\Validator\Type\String;
use ConoHa\Exception\ValidatorException;

/**
 * UUID型
 */
class Uuid extends String
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

        if(!preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i', $value)) {
            throw new ValidatorException('The value does not match UUID format.');
        }
    }
}
