<?php

namespace App\Http\Controllers\Public\Pendataan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Siswa;

class StatusController extends Controller
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
        $value = Siswa::where('users_id', $uid)->get();
        $fitur = Feature::where('id', 1)->get();

        return view('Public.Pendataan.Status', compact('value','fitur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uid    = auth()->user()->id;
        $status = 'NOT VERIFIED';

        $postStatus = Siswa::where('users_id', $uid)->update([
            'status' => $status,
        ]);

        return redirect()->route('get.pendataan.finalisasi');
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
