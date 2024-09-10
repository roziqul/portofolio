<?php

namespace App\Http\Controllers\Public\Seleksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSPPPaymentRequest;
use App\Models\Feature;
use App\Models\spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
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
        $spp   = spp::where('siswa_id', $uid)->get();
        $fitur = Feature::where('id', 4)->get();

        return view('Public.Seleksi.Daful', compact('spp','fitur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateSPPPaymentRequest $request)
    {
        $uid  = auth()->user()->id;
        $validated = $request->validated();

        if ($request->hasFile('bukti_tf')) {
            $storedFilePath = Storage::putFile('public/bukti_daftar-ulang_siswa', $request->file('bukti_tf'));
            $validated['bukti_tf'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
        }

        if ($validated) {
            $valid = spp::where('siswa_id', $uid)->update($validated);
            return redirect()->route('get.seleksi.status')->with('success', 'Data berhasil diupdate !');
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
