<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Enums\DegreeEnums;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrtuRequest;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Siswa;
use App\Models\Ortu;

class OrtuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $degrees = DegreeEnums::$ENTRIES; 

        $fitur  = Feature::where('id', 1)->get();
        $uid    = auth()->user()->id;
        $siswa  = Siswa::where('id', $uid)->get();
        $ortu  = Ortu::where('siswa_id', $uid)->get();
    
        return view('Public.Pendataan.Ortu', compact('ortu','degrees','fitur','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateOrtuRequest $request)
    {
        $uid = auth()->user()->id;
        $validated = $request->validated();

        if ($validated) {
            $valid = Ortu::where('siswa_id', $uid)->update($validated);
            return redirect()->route('get.pendataan.pemberkasan')->with('success', 'Data berhasil diupdate !');
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
