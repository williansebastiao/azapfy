<?php

namespace App\Http\Requests\Validators;

use App\Business\Enum\StatusCode;
use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $invoiceId = $this->route('id');
        return [
            'document_code' => [
                'required',
                'size:9',
                Rule::unique('invoices', 'document_code')->ignore($invoiceId),
            ],
            'amount' => 'required',
            'date_of_issue' => 'required|date_format:d/m/Y',
            'document_sender' => 'required|size:18',
            'sender_name' => 'required|min:4|max:100',
            'document_transporter' => 'required|size:18',
            'transporter_name' => 'required|min:4|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'document_code' => 'número',
            'amount' => 'valor',
            'date_of_issue' => 'data de emissão',
            'document_sender' => 'cnpj do remetente',
            'sender_name' => 'nome do remetente',
            'document_transporter' => 'cnpj do transportador',
            'transporter_name' => 'nome do transportador',
        ];
    }

    /**
     * @param Validator $validator
     * @return mixed
     */
    public function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(Response::output(StatusCode::UNPROCESSABLE_ENTITY, $validator->errors()->first()));
    }
}
