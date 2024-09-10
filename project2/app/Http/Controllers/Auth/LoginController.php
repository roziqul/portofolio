<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('Auth.Login');
    }
  
    public function login(Request $request)
    {   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
      
        if(Auth::attempt($credentials))
        {
            if (auth()->user()->role == 'ADMIN') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('public.dashboard');
            }
        }
        else{
            return view('Auth.Login')->with('error','Email And Password are incorrect.');
        }
           
    }
}
