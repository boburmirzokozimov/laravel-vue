<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
            'card_number' => 'required|numeric|min:16',
            'expire_date' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'credit_card_request_id' => 'required|exists:credit_card_requests,id',
            'name' => 'string|nullable',
            'anonymous_name' => 'string|nullable',
            'surname' => 'string|nullable',
            'anonymous_surname' => 'string|nullable',
            'middle_name' => 'string|nullable',
        ];
    }
}
