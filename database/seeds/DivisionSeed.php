<?php

use Illuminate\Database\Seeder;
use App\Division;
use Illuminate\Support\Str;
class DivisionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            Division::create([
            'd_name' => Str::random(10),
            'd_priority' => 5,
        ]);
     }
    }
}
