<?php

namespace App\Http\Requests\Api\Transaction;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequestForm extends FormRequest
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
            'type' => 'in:1,2',
            'sort' => 'in:XAU,XAG,XPT,BTC,ETH,BNB,ADA,DOT',
            'sum' => 'int',
            'withdraw' => 'boolean',
            ''
        ];
    }
}
