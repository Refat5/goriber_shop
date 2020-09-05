<?php

use Illuminate\Database\Seeder;
use App\Cart;
use Illuminate\Support\Str;
class CartSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            Cart::create([
            'product_id' => 6,
            'user_id' => 5,
            'order_id' => 5,
            'ip_address' => 5,
            'product_quantity' => 5,

        ]);
     }
    }
}
