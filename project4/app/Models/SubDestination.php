<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'main_destination_id',
        'name',
    ];

    function MainDestination() {
        return $this->belongsTo(MainDestination::class);
    }

    function Gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    function Review()
    {
        return $this->hasMany(Review::class);
    }
}
