<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    public $fillable = 
    [
        'product_id',
		'user_id',
		'order_id',
		'ip_address',
		'product_quantity'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);

    }
      public function order()
    {
    	return $this->belongsTo(Order::class);
    	
    }
      public function product()
    {
    	return $this->belongsTo(Product::class);
    	
    }

      //total carts
    public static function totalCarts()
    {
        if (Auth::check())
         {
           $carts = Cart::where('user_id',Auth::id())
           ->orwhere('ip_address',request()->ip())
           ->where('order_id',NULL)
           ->get();

          /*  ->orwhere('ip_address',request()->ip())*/
        }
        else
        {
            $carts = Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }
       
        return $carts;
    }

    //Total Item 
    public static function totalItem()
    {
         $carts = Cart::totalCarts();
         $totalItem = 0;
        foreach ($carts as $cart )
         {
            $totalItem+= $cart->product_quantity;
        }
        return $totalItem;

    }


}
