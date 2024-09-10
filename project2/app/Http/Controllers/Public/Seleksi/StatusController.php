<?php

namespace App\Http\Controllers\Public\Seleksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Seleksi;
use App\Models\Siswa;
use App\Models\spp;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function get()
    {
        $uid     = auth()->user()->id;
        $seleksi = Seleksi::where('daftar_id', $uid)->get();
        $daftar  = Pendaftaran::where('siswa_id', $uid)->get();
        $spp     = spp::where('siswa_id', $uid)->get();

        return view('Public.Seleksi.Status', compact('daftar', 'seleksi', 'spp'));
    }
    public function cetak()
    {
        $uid       = auth()->user()->id;
        $siswa     = Siswa::where('id', $uid)->first();
        $nisn      = $siswa->nisn;
        $nama      = $siswa->nama;
        $schorigin = $siswa->schorigin;

        $ss     = Siswa::where('id', $uid)->get();

        $seleksi     = Seleksi::where('siswa_id', $uid)->first();
        $point       = $seleksi->point;
        $status      = $seleksi->status;

        $datasiswa = [
            'Nomor Pendaftaran' => $uid,
            'NISN'              => $nisn,
            'Nama Siswa'        => $nama,
            'Asal Sekolah'      => $schorigin,
        ];

        $dataseleksi = [
            'Total Point'         => $point,
            'Status'              => $status,
        ];

        return view('Public.Seleksi.Bukti', compact('datasiswa','dataseleksi','ss'));

        // $pdf = Pdf::loadView('Public.Seleksi.Bukti', compact('datasiswa','dataseleksi','ss'));
        // Pdf::setOption(['dpi' => 300, 'defaultFont' => 'sans-serif']);
        // return $pdf->stream('Bukti Penerimaan.pdf');

    }
}
