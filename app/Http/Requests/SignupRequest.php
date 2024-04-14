<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupRequest extends FormRequest
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
            'phone_number' => ['required', 'numeric', 'min:9'],
            'birthdate' => ['required'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
        ];
    }

    public function messages ()
    {
        return [

            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',

            'email.required' => 'La dirección de correo electrónico es obligatoria.',
            'email.string' => 'La dirección de correo electrónico debe ser una cadena de caracteres.',
            'email.min' => 'La dirección de correo electrónico debe tener al menos :min caracteres.',
            'email.max' => 'La dirección de correo electrónico no puede tener más de :max caracteres.',
            'email.unique' => 'Esta dirección de correo electrónico ya está registrada.',

            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.numeric' => 'El número de teléfono debe de ser totalmente númerico.',
            'phone_number.min' => 'El número de teléfono debe tener al menos :min caracteres.',

            'birthdate.required' => 'La fecha de nacimiento es obligatorio',

            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener mínimo :min caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
        ];
    }
}
