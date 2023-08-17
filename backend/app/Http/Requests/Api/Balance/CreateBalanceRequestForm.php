<?php

namespace App\Http\Requests\Api\Balance;

use App\Models\Enum\TypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBalanceRequestForm extends FormRequest
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
            'currency' => 'string|required',
            'contact' => 'string|required',
            'sum' => 'required|regex:/^\d*(\.\d{3})?$/',
            'phone' => 'numeric|min:10',
            'client_id' => 'exists:clients,id',
            'withdraw' => 'nullable|boolean',
            'form' => 'nullable|in:1,2'
        ];

        if (request()->request->get('type') === TypeEnum::CASHLESS->name ||
            request()->request->get('type') === TypeEnum::USDT->name) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'required|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id',
                'withdraw' => 'nullable|boolean'
            ];
        }

        if (request()->request->get('type') === TypeEnum::CASHLESS->name && request()->request->get('withdraw')) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'required|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id',
                'withdraw' => 'nullable|boolean',
                'withdraw_account_number' => 'required|numeric'
            ];
        }

        if (request()->request->get('type') === TypeEnum::USDT->name && request()->request->get('withdraw')) {
            $rules = [
                'usdt_type' => 'string',
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'required|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id',
                'withdraw' => 'nullable|boolean',
                'withdraw_wallet_number' => 'required|numeric'
            ];
        }


        return $rules;
    }
}
