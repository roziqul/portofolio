<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePSBPaymentRequest;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Siswa;
use App\Models\psb;
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
        $uid    = auth()->user()->id;
        $siswa  = Siswa::where('users_id', $uid)->get();
        $psb    = psb::where('siswa_id', $uid)->get();
        $fitur  = Feature::where('id', 1)->get();

        return view('Public.Pendataan.Payment', compact('siswa','psb','fitur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdatePSBPaymentRequest $request)
    {
        $uid  = auth()->user()->id;
        $validated = $request->validated();

        if ($request->hasFile('bukti_tf')) {
            $storedFilePath = Storage::putFile('public/bukti_regis_siswa', $request->file('bukti_tf'));
            $validated['bukti_tf'] = URL::to('/') . Str::of($storedFilePath)->replaceFirst('public/', '/storage/');
        }

        if ($validated) {
            $valid = psb::where('siswa_id', $uid)->update($validated);
            return redirect()->route('get.pendataan.finalisasi')->with('success', 'Data berhasil diupdate !');
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
