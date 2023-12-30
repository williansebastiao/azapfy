<?php

namespace App\Exceptions;
use Exception;

class UserException extends Exception
{

    public function __construct($message = "User not found", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
