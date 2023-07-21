<?php

namespace App\Http\Controllers\BloodSeeker;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('templates.basic.');
    }

    public function login(Request $request) {

        $user = User::find();
    }
}
