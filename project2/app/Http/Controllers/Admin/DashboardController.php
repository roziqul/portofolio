<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        $user = User::where('role', 'PUBLIC')->count();
        $siswa = Siswa::where('status', '==', 'WAITING VERIFICATION')->count();
        $daftar = Pendaftaran::where('status', '==', 'WAITING VERIFICATION')->count();

        return view('Admin.Dashboard', compact('user','siswa','daftar'));
    }
}
