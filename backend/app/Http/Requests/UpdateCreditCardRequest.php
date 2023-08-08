<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCreditCardRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'middle_name' => 'required|string',
            'phone' => 'required|numeric',
            'birth_date' => 'required|date',
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
