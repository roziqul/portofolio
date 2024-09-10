<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function subDestinations() {
        return $this->hasMany(SubDestination::class);
    }
}
