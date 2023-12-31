<?php

namespace App\Http\Requests\Country;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequestForm extends FormRequest
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
            'name' => 'string|nullable',
            'name_official' => 'string|nullable',
            'name_common' => 'string|nullable',
            'flag' => 'file|nullable',
        ];
    }
}
