<?php

namespace App\Helpers;

class Date
{

    /**
     * @param string $date
     * @return string
     */
    static function database(string $date): string
    {
        return implode('-', array_reverse(explode('/', $date)));
    }

    /**
     * @param string $date
     * @return string
     */
    function brazil(string $date): string
    {
        return date('d/m/Y', strtotime($date));
    }

}
