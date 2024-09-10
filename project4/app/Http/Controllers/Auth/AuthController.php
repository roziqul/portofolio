<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginpage()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
      
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }else{
            Alert::error('Autentikasi Gagal', 'Silahkan periksa kembali email dan password yang anda masukkan!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        
        return redirect()->route('login');
    }
}
