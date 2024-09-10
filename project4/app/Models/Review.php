<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_customer',
        'name',
        'sub_destination_id',
        'review',
        'documentation'
    ];

    function subDestination() {
        return $this->belongsTo(SubDestination::class);
    }
}
