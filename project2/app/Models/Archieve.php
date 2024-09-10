<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archieve extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id','foto','akta','kk','skl','nisn','raport1','raport2','raport3','raport4','raport5',
    ];
}
