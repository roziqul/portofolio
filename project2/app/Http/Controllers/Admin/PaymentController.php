<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seleksi;
use App\Models\Siswa;
use App\Models\spp;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function filter(Request $request)
    {
        $no      = 1;
        $cond1   = 'VERIFIED';
        $cond2   = 'WAITING VERIFICATION';
        $cond3   = 'NOT VERIFIED';
        $cond4   = 'REJECTED';
        $filter  = $request->input('filter');
        $seleksi = Seleksi::where('status', 'LOLOS')->get('siswa_id');

        switch ($filter) {
            case 'option1': //ALL DATA
                $value = spp::with('Siswa')->whereIn('siswa_id', $seleksi)->orderBy('siswa_id', 'DESC')->get();
                break;
            case 'option2': //VERIFIED
                $value = spp::whereIn('siswa_id', $seleksi)->where('status', $cond1)->orderBy('siswa_id', 'DESC')->get();
                break;
            case 'option3': //WAITING VERIFICATION
                $value = spp::whereIn('siswa_id', $seleksi)->where('status', $cond2)->orderBy('siswa_id', 'DESC')->get();
                break;
            case 'option4': //NOT VERIFIED
                $value = spp::whereIn('siswa_id', $seleksi)->where('status', $cond3)->orderBy('siswa_id', 'DESC')->get();
                break;
            case 'option5': //REJECTED
                $value = spp::whereIn('siswa_id', $seleksi)->where('status', $cond4)->orderBy('siswa_id', 'DESC')->get();
                break;
            default :
                $value = spp::whereIn('siswa_id', $seleksi)->where('status', '!=', 'VERIFIED')->orderBy('status', 'DESC')->get();
                break;
        }

        return view('Admin.Payment.Index', compact('value','no'));
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
        $id            = $request->siswa_id;
        $statusPayment = $request->input('statusPayment');
        $auth          = auth()->user()->username;

        if ($statusPayment == '0') {
            $spp = spp::where('siswa_id', $id)->update([
                'status'      => 'REJECTED',
                'verified_by' => $auth,
            ]);
            $Seleksi = Seleksi::where('siswa_id', $id)->update([
                'status'      => 'RESIGN',
            ]);
            $Siswa   = Siswa::where('id', $id)->update([
                'status'      => 'RESIGN',
                'verified_by' => $auth,
            ]);
        };

        if ($statusPayment == '1') {
            $spp   = spp::where('siswa_id', $id)->update([
                'status'      => 'NOT VERIFIED',
                'verified_by' => $auth,
            ]);
        };

        if ($statusPayment == '2') {
            $spp   = spp::where('siswa_id', $id)->update([
                'status'      => 'VERIFIED',
                'verified_by' => $auth,
            ]);
            $Siswa = Siswa::where('id', $id)->update([
                'status'      => 'ACTIVE',
                'verified_by' => $auth,
            ]);
        };

        return redirect()->route('filterPayment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spp = spp::where('siswa_id', $id)->get();

        return view('Admin.Payment.Show', compact('spp'));
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
