<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert([
            ['name'=>'Sambhalo'],
            ['name'=>'Malkangani'],
            ['name'=>'Khatmi'],
            ['name'=>'Asl-us-Soos'],
            ['name'=>'Zanjabeel'],
            ['name'=>'Adrak'],
        ]);
    }
}
