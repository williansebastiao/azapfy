<?php

namespace App\Business\Services;

use App\Business\DTO\InvoiceDTO;
use App\Business\Enum\StatusCode;
use App\Business\Repositories\InvoiceRepository;
use App\Exceptions\AmountException;
use App\Exceptions\InvoiceException;
use App\Helpers\Str;
use App\Helpers\Validators;
use App\Mail\Invoice;
use App\Models\Invoice as Model;
use Illuminate\Support\Facades\Mail;

class InvoiceService
{

    /**
     * @param array $data
     * @return Model
     * @throws AmountException
     * @throws InvoiceException
     */
    public function store(array $data): Model
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
            throw new InvoiceException('O CNPJ do remetente está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if (!Validators::cnpj($data['document_transporter']))
        {
            throw new InvoiceException('O CNPJ da transportadora está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
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
        $saved = $invoiceRepository->store((array) $invoiceDTO);
        if (!$saved) {
            throw new InvoiceException('Ocorreu um erro ao salvar os dados', StatusCode::INTERNAL_SERVER_ERROR);
        }

        Mail::to(auth()->user()->email)->queue(new Invoice($invoiceDTO));
        return $saved;
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     * @throws AmountException
     * @throws InvoiceException
     */
    public function update(int $id, array $data): Model
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
            throw new InvoiceException('O CNPJ do remetente está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
        }

        if (!Validators::cnpj($data['document_transporter']))
        {
            throw new InvoiceException('O CNPJ da transportadora está incorreto', StatusCode::UNPROCESSABLE_ENTITY);
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
        $saved = $invoiceRepository->update($id, (array) $invoiceDTO);
        if (!$saved) {
            throw new InvoiceException('Ocorreu um erro ao salvar os dados', StatusCode::INTERNAL_SERVER_ERROR);
        }

        return $invoiceRepository->show($id);
    }
}
