<?php

use Illuminate\Database\Seeder;
use App\wishlist;
use Illuminate\Support\Str;

class WishListSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            wishlist::create([
            'product_id' => 5,
            'user_id' => 8,
            'order_id' =>6,

            'product_quantity' => 8,
            'ip_address' => Str::random(12),
        ]);
     } 	 	 	 	 
    }
}
