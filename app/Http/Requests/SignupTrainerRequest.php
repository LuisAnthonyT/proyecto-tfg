<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupTrainerRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'min:10', 'max:255', 'unique:users'],
            'experiencie' => ['required', 'numeric'],
            'specialization' => ['required', 'min:4'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
        ];
    }

    public function messages ()
    {
        return [

            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de carácteres.',
            'name.min' => 'El nombre debe tener al menos :min carácteres.',
            'name.max' => 'El nombre no puede tener más de :max carácteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de carácteres.',
            'email.min' => 'El correo electrónico debe tener al menos :min carácteres.',
            'email.max' => 'El correo electrónico no puede tener más de :max carácteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'experiencie.required' => 'La experiencia es obligatoria.',
            'experiencie.numeric' => 'La experiencia debe de ser totalmente númerico.',

            'specialization.required' => 'La especialización es obligatoria',
            'specialization.min' => 'La especialización debe de tener mínimo 4 carácteres',

            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener mínimo :min carácteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
        ];
    }
}
