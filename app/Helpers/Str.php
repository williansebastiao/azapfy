<?php

namespace App\Helpers;

use NumberFormatter;

class Str
{

    /**
     * @param string $value
     * @return string
     */
    static function clearSpecialCharacters(string $value): string
    {
        $str = str_replace('-', '', $value);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
    }

    /**
     * @param string $value
     * @return string
     */
    static function monetary(string $value): string
    {
        $str = str_replace('R$ ', '', $value);
        $str = str_replace('.', '', $str);
        $str = str_replace(',', '.', $str);
        return $str;
    }

    /**
     * @param string $mask
     * @param string $str
     * @return string
     */
    static function mask(string $mask, string $str): string
    {
        $str = str_replace(" ", "", $str);
        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }
        return $mask;
    }

    public static function moneyFormat(float $value): string
    {
        $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($value, 'BRL');
    }

}
