<?php

namespace App\Http\Requests\Api\VisaCard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VisaCardRequestForm extends FormRequest
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
        if (request()->has('anonymous')) {
            $rules = [
                'anonymous' => 'required',
                'anonymous_name' => 'string|required',
                'anonymous_surname' => 'string|required',
            ];
        } else {
            $rules = [
                'name' => 'string|nullable',
                'surname' => 'string|nullable',
                'middle_name' => 'string|nullable',
                'phone' => 'numeric|nullable',
                'birth_date' => 'nullable',
                'scan_passport' => 'nullable',
                'selfie_passport' => 'nullable'
            ];
        }

        return $rules;
    }
}
