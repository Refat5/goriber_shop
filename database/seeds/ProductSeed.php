<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Str;
class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            Product::create([
            'category_id' => 6,
            'brand_id' => 2,
            'p_title' => Str::random(10),
            'p_slug' => Str::random(10),
            'p_quantity' => 10,
            'p_price' => 10,
            'admin_id' => 5,

            'p_description' => Str::random(35),
        ]);
         	 	 	 	 	 	 	 	
     }
    }
}
