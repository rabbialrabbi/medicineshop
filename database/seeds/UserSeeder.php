<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
              'name'=>'Rabbial Anower',
              'email'=>'admin@g.com',
              'password'=>Hash::make('25252525'),
              'role_type'=>'Admin',
              'is_verified'=>1
            ]
        );
        User::create(
            [
                'name'=>'Mr. Verified Customer',
                'email'=>'customer1@g.com',
                'password'=>Hash::make('12345678'),
                'is_verified'=>1
            ]
        );
        User::create(
            [
                'name'=>'Mr. Unverified Customer',
                'email'=>'customer2@g.com',
                'password'=>Hash::make('12345678'),
            ]
        );
    }
}
