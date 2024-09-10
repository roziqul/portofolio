<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'noref',
        'bukti_tf',
        'status',
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
