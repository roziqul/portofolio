<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'dname','djob','ddegree','daddress','dphone',
        'mname','mjob','mdegree','maddress','mphone',
        'wname','wjob','wdegree','waddress','wphone',
    ];

    function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
