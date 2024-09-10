<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        return view('Public.Dashboard');
    }
}
