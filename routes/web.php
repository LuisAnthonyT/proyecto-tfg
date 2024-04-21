<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainerController;


//RUTA PARA OBTENER LA PÁGINA PRINCIPAL
Route::get('/', function () {
    return view('index');
});

//RUTAS PARA REGISTRASE Y LOGUEARSE
Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [AuthController::class, 'registerUser'])->name('signup');
Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//RUTA INDEX TRAINER
Route::get('trainer', [TrainerController::class, 'index'])->name('trainer');
