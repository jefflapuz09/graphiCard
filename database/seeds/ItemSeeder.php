<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('service_subcategory')->insert([
            'name' => 'Mug',
            'categoryId' => 1,
            'description' => 'Sample description here.',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('service_subcategory')->insert([
            'name' => 'T-Shirt',
            'categoryId' => 1,
            'description' => 'Sample description here.',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('service_subcategory')->insert([
            'name' => 'Notepad',
            'categoryId' => 1,
            'description' => 'Sample description here.',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
