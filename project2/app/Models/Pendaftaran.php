<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id','raport_avg','subject_avg','agm_avg',
        'raport1','raport2','raport3','raport4','raport5',
        'agm1','agm2','agm3','agm4','agm5',
        'ind1','ind2','ind3','ind4','ind5',   
        'mat1','mat2','mat3','mat4','mat5',          
        'ipa1','ipa2','ipa3','ipa4','ipa5',   
        'ing1','ing2','ing3','ing4','ing5',   
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

}
