<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $aktif = 'ACTIVE';
        
        return Siswa::where('status', $aktif)->orderBy('nama', 'ASC')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'NISN',
            'NAMA LENGKAP',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'AGAMA',
            'JENIS KELAMIN',
            'NOMOR HP',
            'ALAMAT',
            'ASAL SEKOLAH',
            'CATATAN',
            'STATUS',
            'DI VERIFIKASI OLEH',
            'TANGGAL DIBUAT',
            'TANGGAL DIPERBARUI',
        ];
    }
}
