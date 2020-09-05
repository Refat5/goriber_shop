<?php

use Illuminate\Database\Seeder;

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
            Brand::create([
            'product_id' => Str::random(6),
            'user_id' => Str::random(5),
            'order_id' => Str::random(5),
            'ip_address' => Str::random(5),
            'product_quantity' => Str::random(5),

        ]);
     }
    }
}
