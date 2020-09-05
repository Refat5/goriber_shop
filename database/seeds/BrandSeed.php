<?php

use Illuminate\Database\Seeder;
use App\Brand;
use Illuminate\Support\Str;
class BrandSeed extends Seeder
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
            'b_name' => Str::random(10),
            'b_image' => Str::random(8).'.jpg',
            'b_description' => Str::random(35),
        ]);
     }
          
    
    }
}
