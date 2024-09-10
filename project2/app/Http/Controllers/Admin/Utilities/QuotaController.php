<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use Illuminate\Http\Request;

class QuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function get()
    {
        $value = Quota::all();

        return view('Admin.Quota.Index', compact('value'));
    }

    public function show($id)
    {
        $value = Quota::where('id', $id)->get();

        return view ('Admin.Quota.Show', compact('value'));
    }

    public function store(Request $request)
    {
        $id   = $request->id;
        $auth = auth()->user()->name;

        $update = Quota::where('id', $id)->update([
            'quota'      => $request->quota,
            'updated_by' => $auth,
        ]);

        return redirect()->route('utilities.kuota');
    }
}
