<?php

use Illuminate\Database\Seeder;
use App\Slider;
use Illuminate\Support\Str;
class SlideSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            Slider::create([
            'title' => Str::random(10),
            'button_text' => Str::random(10),
            'button_url' => Str::random(10).'.com',

            'image' => Str::random(8).'.jpg',
            'priorety' => 5,
        ]);
     } 	 	 	 	 
    }
}
