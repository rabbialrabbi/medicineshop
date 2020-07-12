<?php

use App\ItemType;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemType::insert([
            ['name'=>'Food'],
            ['name'=>'Unani'],
            ['name'=>'Ayurvedic'],
        ]);
    }
}
