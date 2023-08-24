<?php

namespace App\Http\Requests\Key;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateKeyRequestForm extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'wallet_number_erc' => 'string|required',
            'wallet_number_trc' => 'string|required',
            'account_number_sepa' => 'string|required',
            'account_number_swift' => 'string|required',
        ];
    }
}
