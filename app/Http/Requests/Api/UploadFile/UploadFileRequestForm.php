<?php

namespace App\Http\Requests\Api\UploadFile;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequestForm extends FormRequest
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
            'message' => 'file',
            'chat_room_id' => 'integer|required|exists:chat_rooms,id',
            'type' => 'string|required|in:image,audio,video,doc'
        ];
    }
}
