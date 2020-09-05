<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            User::create([
            'first_name' => Str::random(10),
            'mobile_no' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => Str::random(10),
            'division_id' => 2,
            'ip_address' => Str::random(4),
            'district_id' =>5,
            'street_address' => Str::random(8),
            'email' => Str::random(8).'@gmail.com',
            'password' => Hash::make('password'),
      
        ]);
    
     }
    }
}
