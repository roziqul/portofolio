<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'nip',
        'position_id'
    ];

    function position() {
        return $this->belongsTo(Position::class);
    }
}
