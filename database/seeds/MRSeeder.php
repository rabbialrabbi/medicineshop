<?php

use App\MR;
use Illuminate\Database\Seeder;

class MRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MR::insert([
            [
                'code'=>'2001',
                'name'=>'Mr. Verified Customer',
                'user_id'=>2,
                'address1'=>'Uttara,Dhaka',
                'contact1'=>'01723586245',
                'email1'=>'customer1@g.com',
                'fax'=>200,
                'image'=>'mr_MR-5030_1594811303.png'
            ],
            [
                'code'=>'2002',
                'name'=>'Mr. Unverified Customer',
                'user_id'=>3,
                'address1'=>'Uttara,Dhaka',
                'contact1'=>'01723586245',
                'email1'=>'customer2@g.com',
                'fax'=>'01723586245',
                'image'=>'mr_MR-5030_1594912459.png'
            ],

        ]);
    }
}
