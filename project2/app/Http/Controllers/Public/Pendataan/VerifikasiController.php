<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVerifikasiRequest;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Siswa;

class VerifikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uid   = auth()->user()->id;
        $siswa = Siswa::where('id', $uid)->get();
        $fitur = Feature::where('id', 1)->get();

        return view('Public.Pendataan.Verifikasi', compact('siswa','fitur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateVerifikasiRequest $request)
    {
        $uid  = auth()->user()->id;
        $validated = $request->validated();

        if ($validated) {
            $valid = Siswa::where('id', $uid)->update($validated);
            return redirect()->route('get.pendataan.biodata')->with('success', 'Data berhasil diupdate !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
