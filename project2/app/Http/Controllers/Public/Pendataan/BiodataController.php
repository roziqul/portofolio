<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Enums\GenderEnums;
use App\Enums\ReligionEnums;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBiodataRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Siswa;

class BiodataController extends Controller
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
        $uid    = auth()->user()->id;

        $religions = ReligionEnums::$ENTRIES;
        $genders = GenderEnums::$ENTRIES; 

        $fitur  = Feature::where('id', 1)->get();
        $siswa  = Siswa::where('users_id', $uid)->get();

        return view('Public.Pendataan.Biodata', compact('religions','genders','fitur','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateBiodataRequest $request)
    {
        $uid  = auth()->user()->id;
        $validated = $request->validated();

        if ($validated) {
            $valid = Siswa::where('users_id', $uid)->update($validated);
            return redirect()->route('get.pendataan.ortu')->with('success', 'Data berhasil diupdate !');
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
