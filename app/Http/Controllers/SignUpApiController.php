<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SignupAthleteRequest;

class SignUpApiController extends Controller
{
    public function verifyEmail (Request $request)
    {
        return ['validEmail' => User::where('email', $request->email)->count()];
    }
}
