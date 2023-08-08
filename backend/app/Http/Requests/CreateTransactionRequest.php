<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
        $rules = [
            'sum' => 'numeric',
            'type' => 'in:SEPA,SWIFT',
            'withdraw' => 'boolean|required',
            'card_number' => 'required|numeric|min:16',
        ];

        if ($this->request->get('withdraw')) {
            $rules = [
                'sum' => 'numeric|required',
                'type' => 'required|in:SEPA,SWIFT',
                'invoice_file' => 'file|required',
                'withdraw' => 'boolean|required',
            ];
        }

        return $rules;
    }
}
