<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function get()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
    }

    public function logout()
    {
        return view('auth.login');
    }
}
