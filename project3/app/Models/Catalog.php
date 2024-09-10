<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover','section_id','category_id','title',
        'writer','publisher','release_year','price','status',
    ];

    function section() {
        return $this->belongsTo(Section::class);
    }

    function category() {
        return $this->belongsTo(Category::class);
    }

}
