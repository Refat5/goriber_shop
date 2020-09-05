<?php

use Illuminate\Database\Seeder;
use App\District;
use Illuminate\Support\Str;
class DistricSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            District::create([
            'ds_name' => Str::random(10),  
            'division_id' => 5,
        ]);
     }
    }
}
