<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nutrition;
use App\Models\Athlete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NutritionpApiController extends Controller
{
    public function addNutrition (Request $request)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
                'trainer_id' => 'required',
                'athlete_id' => 'required',
                'day_type' => 'required|string|max:20|min:4',
                'carbohydrates' => 'required|numeric|between:0,999.99',
                'proteins' => 'required|numeric|between:0,999.99',
                'fats' => 'required|numeric|between:0,999.99',
                'calories' => 'required|numeric|between:0,10000.99',
            ]);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }

            // Crear un nuevo registro de nutrición
            $nutrition = Nutrition::create([
                'trainer_id' => $request->trainer_id,
                'athlete_id' => $request->athlete_id,
                'day_type' => $request->day_type,
                'carbohydrates' => $request->carbohydrates,
                'proteins' => $request->proteins,
                'fats' => $request->fats,
                'calories' => $request->calories,
            ]);

            if (!$nutrition) {
                $data = [
                    'message' => 'Error al crear un registro en la nutrición',
                    'status' => '500'
                ];
                return response()->json($data, 500);
            }

            // Respuesta exitosa
            $data = [
                'message' => 'Registro creado con éxito',
                'status' => 201
            ];
            return response()->json($data, 201);

        } catch (Exception $e) {
            Log::error('Error al insertar datos nutricionales: ' . $e->getMessage());
            // Manejar errores de base de datos o validación
            return response()->json([
                'message' => 'Error al insertar datos nutricionales',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
