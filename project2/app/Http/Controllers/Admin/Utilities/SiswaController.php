<?php

namespace App\Http\Controllers\Admin\Utilities;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\SiswasExport;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\Archieve;
use App\Models\Siswa;
use App\Models\Ortu;
use App\Models\User;
use App\Models\psb;
use App\Models\spp;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function all()
    {
        $aktif = 'ACTIVE';
        $value = Siswa::where('status', $aktif)->orderBy('nama', 'ASC')->get();

        return view('Admin.Siswa.Index', compact('value'));
    }

    public function get($id)
    {
        $user    = User::where('id', $id)->get();
        $siswa   = Siswa::where('id', $id)->get();
        $daftar  = Pendaftaran::where('siswa_id', $id)->get();
        $seleksi = Seleksi::where('siswa_id', $id)->get();
        $psb     = psb::where('siswa_id', $id)->get();
        $spp     = spp::where('siswa_id', $id)->get();
        $archieve = Archieve::where('siswa_id', $id)->get();
        $ortu    = Ortu::where('siswa_id', $id)->get();  

        return view('Admin.Siswa.Show', compact('user','siswa','daftar','seleksi','psb','spp','ortu','archieve'));
    }

    public function export()
    {
        return Excel::download(new SiswasExport(), 'siswas.xlsx');
    }
}
