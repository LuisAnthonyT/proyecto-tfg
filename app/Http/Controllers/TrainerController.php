<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupTrainerRequest;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Athlete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignupAthleteRequest;
use App\Http\Requests\UpdateTrainerRequest;
use Illuminate\Support\Facades\Log;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = Auth::user()->trainer;
        $athletes = $trainer->athletes;

        return view('trainer.athletes', compact('athletes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view ('trainer.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerRequest $request, User $user)
    {
        try {
            $user2 = Auth::user();

            $user2->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            if ($user2->trainer) {
                $trainer = $user2->trainer;

                $trainer->update([
                    'specialization' => $request->input('specialization'),
                    'years_experience' => $request->input('years_experience'),
                ]);
            } else {
                throw new \Exception('El usuario no tiene un entrenador asociado.');
            }

            return redirect()->route('view-account-trainer');

        } catch (\Exception $e) {
            Log::error('Error al modificar los datos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar los datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        //
    }

    /**
     * Show the view create-user.
     */
    public function createAthleteView()
    {
        $trainer = Auth::user()->trainer;
        $trainerId = $trainer->id;
        return view('trainer.create_athlete', compact('trainerId'));
    }

    /**
     * Create user-athlete by trainer.
     */
    public function createAthleteByTrainer(SignupAthleteRequest $request, String $trainerId)
    {
        try {
            //Crear y guadar el usuario
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->role = 'athlete';
            $user->password = Hash::make($request->get('password'));
            $user->save();

            //Crear y asociar el entrenador al usuario recién creado
            $athlete = new Athlete();
            $athlete->user_id = $user->id;
            $athlete->trainer_id = $trainerId;
            $athlete->height = $request->get('height');
            $athlete->weight = $request->get('weight');
            $athlete->gender = $request->get('gender');
            $athlete->objetive = $request->get('objetive');
            $athlete->days_available_week = $request->get('days_available_week');
            $athlete->date_birth = $request->get('date_birth');

            $athlete->save();

            return redirect()->route('trainer.index');

        } catch (\Exception $e) {
            if (isset($athlete)) {
                $athlete->delete();
            }

            if (!isset($user)) {
                $user->delete();
            }

            Log::error('Error al registrar el atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al registrar el atleta');
        }
    }
}
