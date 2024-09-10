<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psb extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'noref',
        'bukti_tf',
    ];
}
