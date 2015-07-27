<?php

namespace ConoHa\Exception;

use ConoHa\Validator\Type\BaseType;

class ValidatorException extends \RuntimeException
{
    // private $types = [];
    // public function addErrorType(BaseType $type, $msg)
    // {
    //     $this->types[] = [
    //         'type'    => $type,
    //         'message' => $msg,
    //     ];
    // }

    // public function getErrorTypes()
    // {
    //     return $this->types;
    // }

    // public function getMessage()
    // {
    //     if(count($this->types) == 1) {
    //         return $this->types[0]->message;
    //     } else {
    //         return $this->types[0]->message . ' and other ' . count($this->types) . ' errors';
    //     }
    // }
}
