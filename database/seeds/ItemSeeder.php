<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::insert([
            [
                'item_type_id'=>1,
                'generic_id'=>1,
                'brand_id'=>1,
                'code'=>'5001',
                'name'=>'Honey',
                'size'=>'250ml',
                'dosage'=>'Syrup',
                'price'=>200,
                'description'=>'It is Good For Health',
                'image'=>'item_5002_1595240756.jpg'
            ],
            [
                'item_type_id'=>1,
                'generic_id'=>1,
                'brand_id'=>1,
                'code'=>'5002',
                'name'=>'ROOH AFZA',
                'size'=>'500ml',
                'dosage'=>'Syrup',
                'price'=>150,
                'description'=>'It is Good For Health',
                'image'=>'item_5001_1595240627.jpg'
            ],
            [
                'item_type_id'=>1,
                'generic_id'=>1,
                'brand_id'=>1,
                'code'=>'5003',
                'name'=>'VungVang',
                'size'=>'250ml',
                'dosage'=>'Syrup',
                'price'=>200,
                'description'=>'It is Good For Health',
                'image'=>'item_5003_1595240809.jpg'
            ],
        ]);
    }
}
