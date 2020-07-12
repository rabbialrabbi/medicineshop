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
            ['name'=>'saffro'],
            ['name'=>'cardamom'],
            ['name'=>'citron'],
            ['name'=>'Khamira'],
            ['name'=>'bilious']
        ]);
    }
}
