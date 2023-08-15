<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HelpRequestCreateForm extends FormRequest
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
            'phone' => 'numeric|required',
            'name' => 'string|required',
            'preferred_language' => 'in:RUSSIAN,ENGLISH,HEBREW|required',
            'messenger_type' => 'in:TELEGRAM,WHATSAPP|required'
        ];
    }
}
