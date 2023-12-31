<?php

namespace App\Helpers;

class Date
{

    /**
     * @param $date
     * @return string
     */
    static function database($date): string
    {
        return implode('-', array_reverse(explode('/', $date)));
    }

    /**
     * @param $date
     * @return string
     */
    function brazil($date): string
    {
        return date('d/m/Y', strtotime($date));
    }

}
