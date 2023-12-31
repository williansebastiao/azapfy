<?php

namespace App\Helpers;

use App\Business\Enum\StatusCode;
use App\Exceptions\AmountException;
use App\Exceptions\InvoiceException;

class Validators
{

    /**
     * @param string $value
     * @return AmountException|string
     * @throws AmountException
     */
    static function amount(string $value): AmountException|string
    {
        $amount = Str::monetary($value);
        if (!is_numeric($amount)) {
            throw new AmountException('Valor incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if ($amount <= 0){
            throw new AmountException('Não aceitamos valores menores ou igual a zero', StatusCode::UNPROCESSABLE_ENTITY);
        }

        return $amount;
    }

    /**
     * @param string $value
     * @return bool
     */
    static function cnpj(string $value): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $value);

        if (strlen($cnpj) != 14) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $sum += (int)$cnpj[$i] * ((11 - $i) % 8 + 2);
        }
        $charOne = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);

        $sum = 0;
        for ($i = 0; $i < 13; $i++) {
            $sum += (int)$cnpj[$i] * ((12 - $i) % 8 + 2);
        }
        $charTwo = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);

        return (int)$cnpj[12] == $charOne && (int)$cnpj[13] == $charTwo;

    }

    /**
     * @param bool $value
     * @param string $cnpj
     * @return InvoiceException|string
     * @throws InvoiceException
     */
    private function responseCnpj(bool $value, string $cnpj): InvoiceException|string
    {
        if (!$value) {
            throw new InvoiceException('CNPJ inválido', StatusCode::UNPROCESSABLE_ENTITY);
        }
        return Str::clearSpecialCharacters($cnpj);
    }
}
