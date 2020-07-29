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
         $this->call(UserSeeder::class);
         $this->call(GenericSeeder::class);
         $this->call(BrandSeeder::class);
         $this->call(ItemTypeSeeder::class);
         $this->call(ItemSeeder::class);
         $this->call(MRSeeder::class);
         $this->call(OrderSeeder::class);
         $this->call(OrderDetailsSeeder::class);
         $this->call(MessageSeeder::class);
         $this->call(NoticeSeeder::class);
    }
}
