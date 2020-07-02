<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	public $fillable =
	[
		'b_name',
		'b_image',
		'b_description'
	];
    public function parent()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function product()
    {
    	return $this->hasMany(Brand::class);
    }
}
