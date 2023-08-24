<?php

namespace App\Http\Requests\Branch;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequestForm extends FormRequest
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
            'lat' => 'string|required',
            'lon' => 'string|required',
            'address' => 'string|required',
            'full_address' => 'string|nullable',
            'contact_number' => 'string|nullable',
            'contact_email' => 'string|nullable',
            'working_hours' => 'string|nullable',
        ];
    }
}