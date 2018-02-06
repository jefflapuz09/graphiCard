<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
            'name' => 'Digital Printing',
            'description' => 'Sample description here.',
            'isActive' => 1,
            'isFeatured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('service_categories')->insert([
            'name' => 'Large Offset Printing',
            'description' => 'Sample description here.',
            'isActive' => 1,
            'isFeatured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}