<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'email',
        'contact_wa',
        'contact_wechat',
        'facebook',
        'tiktok',
        'instagram',
    ];
}
