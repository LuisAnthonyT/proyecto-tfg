<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SignUpApiController;
use App\Http\Controllers\Api\NutritionApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsTrainer;

//Ruta para verificar el email
Route::post("verifyEmail", [SignUpApiController::class, 'verifyEmail']);

//RUTA PARA AÑADIR UN NUEVO REGITRO A LA TABLA NUTRITION
Route::post("addNutrition", ['Api\NutritionApiController@store']);
//RUTA PARA ElIMINAR UN REGITROS A LA TABLA NUTRITION
Route::delete("deleteNutrition/{nutrition}", ['Api\NutritionApiController@destroy']);
