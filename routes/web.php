<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\MessageController;
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
Route::get('account', [TrainerController::class, 'edit'])
->name('view-account-trainer')
->middleware(isTrainer::class);

//ROUTES RESOURCE MESSAGE
Route::resource('messages', MessageController::class)
->middleware(isLogin::class);
