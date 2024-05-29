<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use App\Models\Athlete;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNutritionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nutrition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

            return redirect()->route('nutrition.show', $athlete);

        } catch (Exception $e) {
            Log::error('Error al crear la nutrición del atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al crear la nutrición del atleta');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idAthlete)
    {
        try {
            $athlete = Athlete::findOrFail($idAthlete);
            $registers = Nutrition::where('athlete_id', $athlete->id)->get();

            if (auth()->user()->role === 'trainer') {
                return view('nutrition.show_trainer', compact('registers', 'athlete'));
            }

            return view('nutrition.show_athlete', compact('registers'));

        } catch (Exception $e) {
            Log::error('Error al obtener la nutrición del atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al obtener la nutrición del atleta');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nutrition $nutrition)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
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
            //Update de Register
            $nutrition->update([
                'day_type' => $request->input('day_type'),
                'carbohydrates' => $request->input('carbohydrates'),
                'proteins' => $request->input('proteins'),
                'fats' => $request->input('fats'),
                'calories' => $request->input('calories'),
            ]);

            $idAthlete = $nutrition->athlete_id;

            return redirect()->route('nutrition.show', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error al modificar el registro nutricional: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar el registro nutricional');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutrition $nutrition)
    {
        try {
            //Se comprueba que exita el registro
            $nutrition = Nutrition::findOrFail($nutrition->id);

            if (!$nutrition) {
                $data = [
                    'message' => 'Error eliminado el registro nutricional',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }

            $idAthlete = $nutrition->athlete_id;

            Nutrition::findOrFail($nutrition->id)->delete();

            // Respuesta exitosa
            return redirect()->route('nutrition.show', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error al insertar datos nutricionales: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error al eliminar registro nutricionales',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

