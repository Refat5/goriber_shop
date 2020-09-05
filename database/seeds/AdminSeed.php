<?php

use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        for ($i=0; $i < 20; $i++) {
            Admin::create([
            'name' => Str::random(10),
            'mobile_no' => Str::random(10),
            
            'avater' => Str::random(8).'.jpg',
            'email' => Str::random(8).'@gmail.com',
            'password' => Hash::make('password'),
      
        ]);
    
     }

    }
}
