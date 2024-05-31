<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\Athlete;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'day' => 'required|string|min:5',
                'number_sessions' => 'required|numeric|between:0,20',
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
                $workout = Workout::create([
                    'trainer_id' => $athlete->trainer->id,
                    'athlete_id' => $athlete->id,
                    'day' => $request->day,
                    'number_sessions' => $request->number_sessions,
                ]);
            }

            if (!$workout) {
                $data = [
                    'message' => 'Error al crear un registro de entrenamiento',
                    'status' => '500'
                ];
                return response()->json($data, 500);
            }

            return redirect()->route('workout.show', $athlete);

        } catch (Exception $e) {
            Log::error('Error al crear un registro de entrenamiento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al crear un registro de entrenamiento');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idAthlete)
    {
        try {
            $athlete = Athlete::findOrFail($idAthlete);
            $workouts = Workout::where('athlete_id', $athlete->id)->get();

            if (auth()->user()->role === 'trainer') {
                return view('workout.show_trainer', compact('workouts', 'athlete'));
            }

            // return view('nutrition.show_athlete', compact('registers'));

        } catch (Exception $e) {
            Log::error('Error al obtener el entrenamiento del atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al obtener el entrenamiento del atleta');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workout $workout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workout $workout)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
                'day' => 'required|string|min:5',
                'number_sessions' => 'required|numeric|between:0,20',
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
            $workout->update([
                'day' => $request->input('day'),
                'number_sessions' => $request->input('number_sessions'),
            ]);

            $idAthlete = $workout->athlete_id;

            return redirect()->route('workout.show', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error al modificar el dia de entrenamiento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar el dia de entrenamiento');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        try {
            //Se comprueba que exista el registro
            $workout = Workout::findOrFail($workout->id);

            if (!$workout) {
                $data = [
                    'message' => 'Error eliminado el dia de entrenamiento',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }

            $idAthlete = $workout->athlete_id;

            $workout::findOrFail($workout->id)->delete();

            // Respuesta exitosa
            return redirect()->route('workout.show', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error eliminado el dia de entrenamiento: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error eliminado el dia de entrenamiento',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
