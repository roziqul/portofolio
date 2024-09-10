<?php

namespace App\Http\Controllers\Public\Seleksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Feature;
use App\Models\Seleksi;
use App\Models\Siswa;
use App\Models\User;

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
        $uid     = auth()->user()->id;
        $daftar  = Pendaftaran::where('siswa_id', $uid)->get();
        $siswa   = Siswa::where('users_id', $uid)->get();
        $seleksi = Seleksi::where('daftar_id', $uid)->get();
        $fitur   = Feature::where('id', 2)->get();
        $user    = User::where('id', $uid)->get();
    
        return view('Public.Seleksi.Finalisasi', compact('daftar','siswa','seleksi','fitur','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uid    = auth()->user()->id;
        $status = 'WAITING VERIFICATION';

        $postFinalisasi = Pendaftaran::where('siswa_id', $uid)->update([
            'status' => $status ,
        ]);

        return redirect()->route('get.seleksi.perankingan');
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
