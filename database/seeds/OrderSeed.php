<?php

use Illuminate\Database\Seeder;
use App\Order;
use Illuminate\Support\Str;
class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        for ($i=0; $i < 20; $i++) {
            Order::create([
            'user_id' => 10,
            'payment_id' => 10,
            'ip_address' => 10,
            'name' => Str::random(10),
            'mobile_no' => Str::random(10),
            'shipping_address' => Str::random(10),
            'shipping_charge' => 100,
            
            'email' => Str::random(10).'@gmail.com',
            'message' => Str::random(10),

            'transaction_id' => 4,
        ]);
         	 	 	 	 	 	 	 	 	 	
     }
    }
}
