<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_logo',
        'school_name',
        'school_address',
        'school_email',
        'school_website',
        'school_contact',
        'school_vision',
        'school_mission',
        'school_goal',
        'total_class',
        'total_student',
    ];
}
