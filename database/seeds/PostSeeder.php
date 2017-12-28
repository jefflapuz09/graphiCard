<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'categoryId' => 1,
            'typeId' => 1,
            'userId' => 1,
            'details' => 'Sample Details here',
            'image' => 'img/20171226023537.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
