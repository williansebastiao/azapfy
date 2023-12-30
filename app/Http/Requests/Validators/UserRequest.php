<?php

namespace App\Http\Requests\Validators;

use App\Business\Enum\StatusCode;
use App\Helpers\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        return [
            'first_name' => 'required|min:4|max:30',
            'last_name' => 'required|min:4|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:16',
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(Response::output(StatusCode::UNPROCESSABLE_ENTITY, $validator->errors()->first()));
    }
}
