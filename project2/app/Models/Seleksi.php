<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftar_id','siswa_id','point','status'
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
