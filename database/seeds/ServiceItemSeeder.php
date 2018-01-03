<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class ServiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_items')->insert([
            'subcategoryId' => 1,
            'name' => 'Standard Mug',
            'description' => 'Sample description here.',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('service_items')->insert([
            'subcategoryId' => 1,
            'name' => '3D Printed Mug',
            'description' => 'Sample description here.',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
