<?php

namespace App\Exceptions;
use Exception;
class UnverifiedUser extends Exception
{

    public function __construct($message = "unverified user", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

