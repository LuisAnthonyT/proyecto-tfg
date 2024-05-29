<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Athlete;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
                'weigth' => 'required|numeric|between:0,999.99',
            ]);

            if ($validator->fails()) {
                $data = [
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ];
                return response()->json($data, 400);
            }

            $user =  Auth::user();
            $idAthlete = $user->athlete->id;

            $register = Register::create([
                'athlete_id' => $idAthlete,
                'weight' => $request->weigth,
            ]);

            if (!$register) {
                $data = [
                    'message' => 'Error al crear un registro',
                    'status' => '500'
                ];
                return response()->json($data, 500);
            }

            return redirect()->route('register.show', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error al insertar el peso corporal: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al insertar el peso corporal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idAthlete)
    {
        try {
            $athlete = Athlete::FindOrFail($idAthlete);
            $registers = Register::where('athlete_id', $athlete->id)->orderBy('created_at', 'desc')->get();

            if (auth()->user()->role === 'trainer') {
                return view('registers.show_trainer', compact('registers', 'athlete'));
            }

            return view('registers.show_athlete', compact('registers'));

        } catch (Exception $e) {
            Log::error('Error al obtener los registros del atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al obtener los registros del atleta');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Register $register)
    {
        try {
            //Validaciones
            $validator = Validator::make($request->all(), [
                'weight' => 'required|numeric|between:0,999.99',
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
            $register->update([
                'weight' => $request->input('weight'),
            ]);

            $idAthlete = $register->athlete_id;

            return redirect()->route('register.update', $idAthlete);

        } catch (Exception $e) {
            Log::error('Error al modificar el registro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al modificar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        try {
            $idAthlete = $register->athlete_id;

            Register::findOrFail($register->id)->delete();
            return redirect()->route('register.show',$idAthlete);

        } catch (Exception $e) {
            Log::error('Error al borrar el registro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al borrar el registro');
        }
    }
}
