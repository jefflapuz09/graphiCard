<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class AdvisorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advisories')->insert([
            'advisory' => 'An Advisory',
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
