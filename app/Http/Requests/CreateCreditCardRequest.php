<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCreditCardRequest extends FormRequest
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
            'client_id' => 'exists:clients,id',
            'name' => 'string|required',
            'surname' => 'string|required',
            'middle_name' => 'string|required',
            'phone' => 'numeric|required',
            'birth_date' => 'date|required',
            'scan_passport' => 'nullable',
            'selfie_passport' => 'nullable'
        ];

        if (request()->input('anonymous')) {
            $rules = [
                'anonymous' => 'boolean|required',
                'anonymous_name' => 'string|required',
                'anonymous_surname' => 'string|required',
            ];
        }

        return $rules;
    }
}
