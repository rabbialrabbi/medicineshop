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
            ['name'=>'Sambhalo', 'status'=>'Active'],
            ['name'=>'Malkangani', 'status'=>'Active'],
            ['name'=>'Khatmi', 'status'=>'Active'],
            ['name'=>'Asl-us-Soos', 'status'=>'Active'],
            ['name'=>'Zanjabeel', 'status'=>'Active'],
            ['name'=>'Adrak', 'status'=>'Active'],
        ]);
    }
}
