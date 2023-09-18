<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'full_name' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'auth_key' => 'nullable|string',
            'comments' => 'nullable|string',
            'is_active' => 'required|boolean'
        ];
    }
}
