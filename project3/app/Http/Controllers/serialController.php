<?php

namespace App\Http\Controllers;

use App\Models\Serial;
use Illuminate\Http\Request;

class serialController extends Controller
{
    public function index(Request $request)
    {
        $catalogId = $request->catalog_id;

        $serial = Serial::with('student')->where('catalog_id', $catalogId)->get();

        $data = [
            'no' => 1,
            'serial' => $serial,
        ];

        return view('serial.index', $data); 
    }
}
