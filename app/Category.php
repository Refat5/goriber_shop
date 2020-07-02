<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
    	return $this->belongsTo(Category::class, 'c_parent_id');
    }

    public function product()
    {
    	return $this->hasMany(Product::class);
    }

   public static function ParentNotCategory($parent_id,$child_id)
   {
   	$categories = Category::where('id',$child_id)->where('c_parent_id',$parent_id)->get();
   	if (!is_null($categories))
   	 {
   		return true;
   	}
   	else
   	{
   		return false;
   	}
   }
}
