<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupTrainerRequest;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function signupForm()
    {
         return view('auth.signup');
    }

    public function registerUser(SignupTrainerRequest $request)
    {
        try {
            //Crear y guadar el usuario
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->role = 'trainer';
            $user->password = Hash::make($request->get('password'));
            $user->save();

            //Crear y asociar el entrenador al usuario recién creado
            $trainer = new Trainer();
            $trainer->user_id = $user->id;
            $trainer->years_experience = $request->get('experiencie');
            $trainer->specialization = $request->get('specialization');
            $trainer->save();

            //Autenticar al usuario recién creado
            Auth::login($user);

            return redirect()->route('trainer');

        } catch (\Exception $e) {
            if (!isset($user)) {
                $user->delete();
            }
            Log::error('Error al registrar el usuario: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al registrar el usuario');
        }
    }

    public function loginForm()
    {
        // if (Auth::viaRemember()) {
        //     return 'Bienvenido de nuevo';
        // } else if (Auth::check()) {
        //     return redirect()->route('users.account');
        // } else {
            return view('auth.login');
        // }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('trainer.index');
        } else {
            $error = 'Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
