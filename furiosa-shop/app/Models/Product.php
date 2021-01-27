<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
        'id', 'title'
    ];

    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }


    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'image_product');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }


}
