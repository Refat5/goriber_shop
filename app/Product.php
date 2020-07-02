<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Images()
    {
    	return $this->hasMany('App\ProductImage');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);

    }
     public function brand()
    {
    	return $this->belongsTo(Brand::class);

    }

}
