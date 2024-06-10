<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNutritionRequest extends FormRequest
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
            'day_type' => ['required', 'string', 'max:20', 'min:4'],
            'carbohydrates' => ['required', 'numeric', 'between:0,999.99'],
            'proteins' => ['required', 'numeric', 'between:0,999.99'],
            'fats' => ['required', 'numeric', 'between:0,999.99'],
            'calories' => ['required', 'numeric', 'between:0,999.99'],
        ];
    }

    public function messages ()
    {
        return [

            'day_type.required' => 'El tipo de dias es obligatorio.',
            'day_type.string' => 'El tipo de dias debe ser una cadena de carácteres.',
            'day_type.min' => 'El tipo de dias debe tener al menos :min carácteres.',
            'day_type.max' => 'El tipo de dias no puede tener más de :max carácteres.',

            'carbohydrates.required' => 'Los carbohidratos son obligatorios.',
            'carbohydrates.string' => 'Los carbohidratos debe ser un número.',
            'carbohydrates.min' => 'Los carbohidratos debe estar entre :min y :max',

            'proteins.required' => 'Los proteínas son obligatorias.',
            'proteins.string' => 'Los proteínas debe ser un número.',
            'proteins.min' => 'Los proteínas debe estar entre :min y :max',

            'fats.required' => 'Las grasas son obligatorias.',
            'fats.string' => 'Las grasas debe ser un número.',
            'fats.min' => 'Las grasas debe estar entre :min y :max',

            'calories.required' => 'Las calorías son obligatorias.',
            'calories.string' => 'Las calorías debe ser un número.',
            'calories.min' => 'Las calorías debe estar entre :min y :max',
        ];
    }
}
