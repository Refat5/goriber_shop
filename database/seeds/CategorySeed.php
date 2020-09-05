<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            Category::create([
            'c_name' => Str::random(10),
            'c_parent_id' => 5,

            'c_image' => Str::random(8).'.jpg',
            'c_description' => Str::random(35),
             	 	 	 
        ]);
     }
          
    
    }
    
}
