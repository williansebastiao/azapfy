<?php

namespace App\Helpers;

class Str
{

    /**
     * @param $value
     * @return string
     */
    static function clearSpecialCharacters($value): string
    {
        $str = str_replace('-', '', $value);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
    }

    /**
     * @param $value
     * @return string
     */
    static function monetary($value): string
    {
        $str = str_replace('R$ ', '', $value);
        $str = str_replace('.', '', $str);
        $str = str_replace(',', '.', $str);
        return $str;
    }

    /**
     * @param $mask
     * @param $str
     * @return string
     */
    static function mask($mask, $str): string
    {
        $str = str_replace(" ", "", $str);
        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }
        return $mask;
    }

}
