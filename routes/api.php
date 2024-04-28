<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SignUpApiController;
use Illuminate\Support\Facades\Route;


Route::post("verifyEmail", [SignUpApiController::class, 'verifyEmail']);
