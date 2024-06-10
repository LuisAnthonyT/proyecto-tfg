<?php

namespace App\Http\Controllers\Api;

use App\Models\Nutrition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Athlete;
use Illuminate\Support\Facades\Auth;

class NutritionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
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

            $athlete = Athlete::findOrFail($request->athlete_id);

            if ($athlete) {
                // Crear un nuevo registro de nutrición
                $nutrition = Nutrition::create([
                    'trainer_id' => $athlete->trainer->id,
                    'athlete_id' => $athlete->id,
                    'day_type' => $request->day_type,
                    'carbohydrates' => $request->carbohydrates,
                    'proteins' => $request->proteins,
                    'fats' => $request->fats,
                    'calories' => $request->calories,
                ]);
            }


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

            return response()->json([
                'message' => 'Error al insertar datos nutricionales',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nutrition $nutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutrition $nutrition)
    {
        try {
            $nutrition = Nutrition::findOrFail($request->route('nutrition'));

            if (!$nutrition) {
                $data = [
                    'message' => 'Error eliminado registros de nutrición',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }

            Nutrition::findOrFail($request->route('nutrition'))->delete();

            // Respuesta exitosa
            $data = [
                'message' => 'Registro eliminado con éxito',
                'status' => 204
            ];
            return response()->json($data, 204);

        } catch (Exception $e) {
            Log::error('Error al insertar datos nutricionales: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error al eliminar registro nutricionales',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
