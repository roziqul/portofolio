<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniGraduate extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'accepted_at',
        'accepted_desc',
        'year',
    ];
}
