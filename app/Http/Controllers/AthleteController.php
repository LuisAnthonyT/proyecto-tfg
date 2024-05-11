<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignupAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use Illuminate\Support\Facades\Log;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workout.index');
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
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        return view ('athletes.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAthleteRequest $request, User $user2)
    {
        try {
            $user = Auth::user();

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            if ($user->athlete) {
                $athlete = $user->athlete;

                $athlete->update([
                    'height' => $request->input('height'),
                    'weight' => $request->input('weight'),
                    'gender' => $request->input('gender'),
                    'days_available_week' => $request->input('days_available_week'),
                    'date_birth' => $request->input('date_birth'),
                ]);
            } else {
                throw new \Exception('El usuario no tiene un atleta asociado.');
            }

            return redirect()->route('view-account-athlete');

        } catch (\Exception $e) {
            Log::error('Error al modificar los datos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar los datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
