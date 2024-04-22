<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupAthleteRequest extends FormRequest
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
            'height' => 'required|numeric|between:0,999.99',
            'weight' => 'required|numeric|between:0,999.99',
            'gender' => 'required|string|max:10',
            'objetive' => 'required|string|max:20',
            'days_available_week' => 'required|integer|min:0|max:7',
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

            'height.required' => 'El campo altura es obligatorio.',
            'height.numeric' => 'El campo altura debe ser un número.',
            'height.between' => 'El campo altura debe estar entre :min y :max.',

            'weight.required' => 'El campo peso es obligatorio.',
            'weight.numeric' => 'El campo peso debe ser un número.',
            'weight.between' => 'El campo peso debe estar entre :min y :max.',

            'gender.required' => 'El campo género es obligatorio.',
            'gender.string' => 'El campo género debe ser una cadena de caracteres.',
            'gender.max' => 'El campo género no debe tener más de :max caracteres.',

            'objetive.required' => 'El campo objetivo es obligatorio.',
            'objetive.string' => 'El campo objetivo debe ser una cadena de caracteres.',
            'objetive.max' => 'El campo objetivo no debe tener más de :max caracteres.',

            'days_available_week.required' => 'El campo días disponibles por semana es obligatorio.',
            'days_available_week.integer' => 'El campo días disponibles por semana debe ser un número entero.',
            'days_available_week.min' => 'El campo días disponibles por semana debe ser como mínimo :min.',
            'days_available_week.max' => 'El campo días disponibles por semana debe ser como máximo :max.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener mínimo :min carácteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
        ];
    }
}
