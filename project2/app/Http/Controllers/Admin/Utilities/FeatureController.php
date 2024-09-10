<?php

namespace App\Http\Controllers\Admin\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $value = Feature::all();

        return view('Admin.Feature.Index', compact('value'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth   = auth()->user()->name;
        $status = $request->status;
        $req_id = $request->id;

        //PENDAFTARAN = 1, SELEKSI = 2, PERANKINGAN = 3, DAFTAR ULANG = 4
        $case1 = [1,2];

        if ($req_id == 4) {
            if ($status == 'ACTIVE') {
                $post = Feature::where('id', 4)->update([
                    'status'      => $status,
                    'updated_by'  => $auth,
                ]);
                $post = Feature::whereIn('id', $case1)->update([
                    'status'      => 'NON ACTIVE',
                    'updated_by'  => $auth,
                ]);
            } elseif ($status == 'NON ACTIVE') {
                $post = Feature::where('id', 4)->update([
                    'status'      => $status,
                    'updated_by'  => $auth,
                ]);
                $post = Feature::whereIn('id', $case1)->update([
                    'status'      => 'ACTIVE',
                    'updated_by'  => $auth,
                ]);
            }
        } else {
            $post = Feature::where('id', $request->id)->update([
                'status'      => $status,
                'updated_by'  => $auth,
            ]);
            $post = Feature::where('id', 4)->update([
                'status'      => 'NON ACTIVE',
                'updated_by'  => $auth,
            ]);
        }

        return redirect()->route('utilities.feature');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $value = Feature::where('id', $id)->get();

        return view('Admin.Feature.Show', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
