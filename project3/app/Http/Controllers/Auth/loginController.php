<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
      
        if(Auth::attempt($credentials))
        {
            if (auth()->user()->role == 'student') {
                return redirect()->route('student-dashboard');
            } elseif (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
                return redirect()->route('admin-dashboard');
            } else {
                return redirect()->route('login')->with('error','User tidak dikenali');
            }
        }
        else{
            return redirect()->route('login')->with('error','Username And Password are incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        
        return view('auth.login');
    }
}
