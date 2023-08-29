<?php

namespace App\Http\Requests\Api\VisaCard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VisaCardTransactionRequestForm extends FormRequest
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
            'sum' => 'numeric',
            'withdraw' => 'nullable',
            'type' => 'string|nullable|in:SWIFT,SEPA',
        ];
    }
}
