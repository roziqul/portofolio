<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Archieve;
use App\Models\Siswa;
use App\Models\Ortu;
use App\Models\psb;

class FinalisasiController extends Controller
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
        $siswa  = Siswa::where('users_id', $uid)->get();
        $psb    = psb::where('siswa_id', $uid)->get();
        $ortu   = Ortu::where('siswa_id', $uid)->get();
        $archieve = Archieve::where('siswa_id', $uid)->get();
        $fitur  = Feature::where('id', 1)->get();
    
        return view('Public.Pendataan.Finalisasi', compact('siswa','psb','fitur','archieve','ortu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uid    = auth()->user()->id;
        $status = 'WAITING VERIFICATION';

        $postFinalisasi = Siswa::where('users_id', $uid)->update([
            'status' => $status,
        ]);

        return redirect()->route('get.pendataan.status');
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
