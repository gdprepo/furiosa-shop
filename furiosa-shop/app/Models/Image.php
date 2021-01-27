<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [
        'id', 'title'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
