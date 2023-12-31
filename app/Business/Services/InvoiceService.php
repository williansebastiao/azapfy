<?php

namespace App\Business\Services;

use App\Business\DTO\InvoiceDTO;
use App\Business\Enum\StatusCode;
use App\Business\Repositories\InvoiceRepository;
use App\Exceptions\AmountException;
use App\Exceptions\CnpjException;
use App\Helpers\Date;
use App\Helpers\Response;
use App\Helpers\Str;
use App\Helpers\Validators;

class InvoiceService
{

    public function store(array $data)
    {
        $amount = Str::monetary($data['amount']);
        if (!is_numeric($amount)) {
            throw new AmountException('Valor incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if ($amount <= 0){
            throw new AmountException('Não aceitamos valores menores ou igual a zero', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if (!Validators::cnpj($data['document_sender']))
        {
            throw new CnpjException('O CNPJ do remetente está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if (!Validators::cnpj($data['document_transporter']))
        {
            throw new CnpjException('O CNPJ da transportadora está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        $invoiceDTO = new InvoiceDTO(
            $data['document_code'],
            $amount,
            $data['date_of_issue'],
            $data['document_sender'],
            $data['sender_name'],
            $data['document_transporter'],
            $data['transporter_name'],
        );

        $invoiceRepository = new InvoiceRepository();
        return Response::output(StatusCode::CREATED, 'Registro salvo com sucesso', $invoiceRepository->store((array) $invoiceDTO));
    }
}
