<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'banner' => 'img/banner.png',
            'banner2' => 'img/banner1.png',
            'banner3' => 'img/banner2.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
