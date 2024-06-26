<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\SessionWorkoutController;
use App\Http\Middleware\IsTrainer;
use App\Http\Middleware\IsLogin;

//GET HOME VIEW
Route::get('/', function () {
    return view('index');
})->name('home');

//SIGNUP AND LOGIN TRAINER
Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [AuthController::class, 'registerUser'])->name('signup');
Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');

//LOGOUT ALL USERS
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//ROUTES RESOURCE TRAINER
Route::resource('trainer', TrainerController::class)
->middleware(isTrainer::class)
->except(['edit']);

//GET VIEW CREATE ATHLETE BY TRAINER
Route::get('create_athlete', [TrainerController::class, 'createAthleteView'])
->name('view-create-athlete')
->middleware(isTrainer::class);

//CREATE ATHLETE BY TRAINER
Route::post('create_athlete/{trainer}', [TrainerController::class, 'createAthleteByTrainer'])
->name('create-athlete')
->middleware(isTrainer::class);

//GET VIEW ACCOUNT TRAINER
Route::get('account-trainer', [TrainerController::class, 'edit'])
->name('view-account-trainer')
->middleware(isTrainer::class);

//ROUTES RESOURCE MESSAGE
Route::resource('messages', MessageController::class)
->middleware(isLogin::class);

//GET VIEW MESSAGES SEND
Route::get('messages_sent', [MessageController::class, 'showMessagesSent'])
->name('messages_sent')
->middleware(isLogin::class);

//ROUTES RESOURCE ATHLETE
Route::resource('athlete', AthleteController::class)
->middleware(isLogin::class)
->except(['edit']);

//GET VIEW ACCOUNT ATHLETE
Route::get('account-athlete', [AthleteController::class, 'edit'])
->name('view-account-athlete')
->middleware(isLogin::class);

//ROUTES RESOURCE NUTRITION
Route::resource('nutrition', NutritionController::class)
->middleware(isLogin::class)
->except(['edit']);

//ROUTES RESOURCE REGISTER
Route::resource('register', RegisterController::class)
->middleware(isLogin::class)
->except(['edit']);

//ROUTES RESOURCE WORKOUT
Route::resource('workout', WorkoutController::class)
->middleware(isLogin::class)
->except(['edit']);

//ROUTES RESOURCE SESSION WORKOUT
Route::resource('session', SessionWorkoutController::class)
->middleware(isLogin::class)
->except(['edit']);

//MODIFY WEIGHT X REPS ATHLETE
Route::put('modify_weight_reps/{session}', [SessionWorkoutController::class, 'updateWeightRepsByAthlete'])
->name('modify-weight-reps')
->middleware(isLogin::class);
