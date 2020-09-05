<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserSeed::class,
             BrandSeed::class,
             WishListSeed::class,
             OrderSeed::class,
             DivisionSeed::class,
             DistricSeed::class,
             SlideSeed::class,
             CartSeed::class,
             CategorySeed::class,
             ProductSeed::class,
             AdminSeed::class,

           

             ]);
    }
}
