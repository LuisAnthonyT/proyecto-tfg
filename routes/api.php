<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SignUpApiController;
use App\Http\Controllers\NutritionpApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsTrainer;

//Ruta para verificar el email
Route::post("verifyEmail", [SignUpApiController::class, 'verifyEmail']);

//RUTA PARA AÑADIR UN NUEVO REGITRO A LA TABLA NUTRITION
Route::post("addNutrition", [NutritionpApiController::class, 'addNutrition'])
->middleware(IsTrainer::class);

