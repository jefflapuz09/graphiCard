<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
class userEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_employees')->insert([
            'firstName' => 'Aira Marie',
            'middleName' => 'Barrameda',
            'lastName' => 'Coronado',
            'contactNumber' => '09099090909',
            'street' => 'Resolution',
            'brgy' => 'Batasan Hills',
            'city' => 'Quezon City',
            'gender' => 2,
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('user_employees')->insert([
            'firstName' => 'Jefferson Van',
            'middleName' => 'Lao',
            'lastName' => 'Lapuz',
            'contactNumber' => '09058883169',
            'street' => 'Aurora Blvd.',
            'brgy' => 'Sta. Cruz',
            'city' => 'Manila',
            'gender' => 1,
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
