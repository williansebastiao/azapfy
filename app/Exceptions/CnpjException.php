<?php

namespace App\Exceptions;
use Exception;

class CnpjException extends Exception
{
    public function __construct($message = "CNPJ is not correct", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
