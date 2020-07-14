<?php

use App\Generic;
use Illuminate\Database\Seeder;

class GenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Generic::insert([
            ['name'=>'saffro', 'status'=>'Active'],
            ['name'=>'cardamom', 'status'=>'Active'],
            ['name'=>'citron', 'status'=>'Active'],
            ['name'=>'Khamira', 'status'=>'Active'],
            ['name'=>'bilious', 'status'=>'Active']
        ]);
    }
}
