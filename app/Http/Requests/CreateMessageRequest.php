<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'receiver_id' => ['required'],
            'subject' => ['required', 'string', 'min:5', 'max:255'],
            'text' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages()
    {
        return [
            'receiver_id.required' => 'El correo de un atleta es obligatorio.',

            'subject.required' => 'El asunto es obligatorio.',
            'subject.string' => 'El asunto debe ser una cadena de carácteres.',
            'subject.min' => 'El asunto debe tener al menos :min carácteres.',
            'subject.max' => 'El asunto no puede tener más de :max carácteres.',

            'text.required' => 'El mensaje es obligatorio.',
            'text.string' => 'El mensaje debe de ser una cadena de carácteres.',
            'text.max' => 'El mensaje debe tener más de :min carácteres.',
        ];
    }
}
