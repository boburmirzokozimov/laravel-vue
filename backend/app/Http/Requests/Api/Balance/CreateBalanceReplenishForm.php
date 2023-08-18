<?php

namespace App\Http\Requests\Api\Balance;

use App\Models\Enum\Api\Balance\BalancePaymentFormEnumType;
use App\Models\Enum\TypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBalanceReplenishForm extends FormRequest
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
            'type' => 'in:CASH,CASHLESS,USDT',
            'country' => 'string|required',
            'currency' => 'string|required|in:usd,eur',
            'contact' => 'string|required',
            'sum' => 'required|regex:/^\d*(\.\d{3})?$/',
            'phone' => 'numeric|min:10',
            'withdraw' => 'nullable|boolean',
            'delivery' => 'required|in:courier,office'
        ];

        if (request()->request->get('delivery') === BalancePaymentFormEnumType::OFFICE->value) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'country' => 'string|required',
                'branch_id' => 'exists:branches,id|required',
                'withdraw' => 'nullable|boolean',
                'delivery' => 'required|in:courier,office'
            ];
        }

        if (request()->request->get('type') === TypeEnum::CASHLESS->value) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|required|in:usd,eur',
                'account_number' => 'required',
                'withdraw' => 'nullable|boolean',
                'info' => 'string|nullable',
                'delivery' => 'required|in:courier,office'
            ];
        }

        if (request()->request->get('type') === TypeEnum::USDT->value) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|required|in:usd,eur',
                'account_number' => 'required',
                'withdraw' => 'nullable|boolean',
                'delivery' => 'required|in:courier,office'
            ];
        }

        return $rules;
    }
}
