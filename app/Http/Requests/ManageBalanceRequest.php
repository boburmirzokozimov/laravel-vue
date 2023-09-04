<?php

namespace App\Http\Requests;

use App\Models\Enum\TypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ManageBalanceRequest extends FormRequest
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
            'country_id' => 'nullable|exists:countries,id',
            'currency' => 'string|nullable',
            'contact' => 'string|nullable',
            'sum' => 'nullable|regex:/^\d*(\.\d{3})?$/',
            'phone' => 'numeric|min:10|nullable',
            'client_id' => 'exists:clients,id|nullable',
            'withdraw' => 'nullable|boolean'
        ];

        if (request()->request->get('type') === TypeEnum::CASHLESS->name ||
            request()->request->get('type') === TypeEnum::USDT->name) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'nullable|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id|nullable',
                'withdraw' => 'nullable|boolean'
            ];
        }

        if (request()->request->get('type') === TypeEnum::CASHLESS->name && request()->request->get('withdraw')) {
            $rules = [
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'nullable|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id|nullable',
                'withdraw' => 'nullable|boolean',
                'account_number' => 'nullable|numeric'
            ];
        }

        if (request()->request->get('type') === TypeEnum::USDT->name && request()->request->get('withdraw')) {
            $rules = [
                'usdt_type' => 'string|nullable',
                'type' => 'in:CASH,CASHLESS,USDT',
                'currency' => 'string|nullable',
                'sum' => 'nullable|regex:/^\d*(\.\d{3})?$/',
                'info' => 'nullable|string',
                'client_id' => 'exists:clients,id|nullable',
                'withdraw' => 'nullable|boolean',
                'account_number' => 'nullable|numeric'
            ];
        }


        return $rules;
    }
}
