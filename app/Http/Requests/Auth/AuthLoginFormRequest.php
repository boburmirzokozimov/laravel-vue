<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginFormRequest extends FormRequest
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
            'phone' => 'exists:users,phone|required|numeric|min:10',
        ];

        if (request()->login_code) {
            $rules = [
                'phone' => 'exists:users,phone|required|numeric|min:10',
                'login_code' => 'required|numeric|between:1111,9999'
            ];
        }

        return $rules;
    }
}
