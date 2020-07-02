<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class wishlist extends Model
{
	  public function user()
    {
    	return $this->belongsTo(User::class);

    }
    public function product()
    {
    	return $this->belongsTo(Product::class);
    	
    }

       //total wishlist
    public static function totalwishlist()
    {
        if (Auth::check())
         {
           $wishlist = wishlist::where('user_id',Auth::id())
           ->orwhere('ip_address',request()->ip())
           ->where('order_id',NULL)
           ->get();

          /*  ->orwhere('ip_address',request()->ip())*/
        }
        else
        {
            $wishlist = wishlist::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }
       
        return $wishlist;
    }

    //Total Item 
    public static function totalItemw()
    {
         $wishlist = wishlist::totalwishlist();
         $totalItemw = 0;
        foreach ($wishlist as $wishlist )
         {
            $totalItemw+= $wishlist->product_quantity;
        }
        return $totalItemw;

    }

   
}
