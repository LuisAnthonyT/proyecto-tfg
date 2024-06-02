<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\SessionWorkout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SessionWorkoutController extends Controller
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
                'workout_id' => 'required',
                'exercise' => 'required|string|max:30',
                'rest' => 'required|string|max:30',
                'sets' => 'required|string|max:20',
                'reps' => 'required|string|max:30',
                'rir' => 'required|string|max:30',
            ]);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }

            $workout = Workout::findOrFail($request->workout_id);

            if ($workout) {
                // Crear un nuevo registro de sesión
                $session = SessionWorkout::create([
                    'workouts_id' => $workout->id,
                    'exercise' => $request->exercise,
                    'rest' => $request->rest,
                    'sets' => $request->sets,
                    'reps' => $request->reps,
                    'rir' => $request->rir,
                ]);
            }

            if (!$session) {
                $data = [
                    'message' => 'Error al crear una sesión',
                    'status' => '500'
                ];
                return response()->json($data, 500);
            }

            return redirect()->route('session.show', $workout->id);

        } catch (Exception $e) {
            Log::error('Error al crear una sesión: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al crear una sesión');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idWorkout)
    {
        //Obtenemos el atleta
        $workout = Workout::findOrFail($idWorkout);
        $athlete = Athlete::findOrFail($workout->athlete_id);

        //Obtenemos todos los ejercicios y las sesiones del atleta
        $sessions = SessionWorkout::where('workouts_id', $workout->id)->get();

        if (auth()->user()->role === 'trainer') {
            //Obtenemos todos los ejercicios
            $exercises = Exercise::get();

            return view('session.show_trainer', compact('athlete', 'workout', 'exercises', 'sessions'));
        }

        return view('session.show_athlete', compact('athlete', 'workout', 'sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SessionWorkout $session)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
                'exercise' => 'required|string|max:30',
                'rest' => 'required|string|max:30',
                'sets' => 'required|string|max:20',
                'reps' => 'required|string|max:30',
                'rir' => 'required|string|max:30',
            ]);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }

            // Crear un nuevo registro de sesión
            $session->update([
                'exercise' => $request->exercise,
                'rest' => $request->rest,
                'sets' => $request->sets,
                'reps' => $request->reps,
                'rir' => $request->rir,
            ]);

            $workoutId = $session->workouts_id;

            return redirect()->route('session.show', $workoutId);

        } catch (Exception $e) {
            Log::error('Error al modificar una sesión: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar una sesión');
        }
    }

    /**
     * Remove the specified resource from storage.
     */



    public function destroy(SessionWorkout $session)
    {
        try {
            //Se comprueba que exita el registro
            $session = SessionWorkout::findOrFail($session->id);

            if (!$session) {
                $data = [
                    'message' => 'Error eliminado la sesión',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }

            $workoutId = $session->workouts_id;

            SessionWorkout::findOrFail($session->id)->delete();

            // Respuesta exitosa
            return redirect()->route('session.show', $workoutId);

        } catch (Exception $e) {
            Log::error('Error al eliminar la sesión: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error al eliminar la sesión',
                'error' => $e->getMessage()
            ], 500);
        }

    }

     /**
     * Update the specified resource in storage.
     */
    public function updateWeightRepsByAthlete(Request $request, SessionWorkout $session)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
                'weight_reps' => 'required|string|max:150',
            ]);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }

            // Crear un nuevo registro de sesión
            $session->update([
                'weight_reps' => $request->weight_reps,
            ]);

            $workoutId = $session->workouts_id;

            return redirect()->route('session.show', $workoutId);

        } catch (Exception $e) {
            Log::error('Error al modificar el campo peso x reps: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar el campo peso x reps');
        }
    }
}
