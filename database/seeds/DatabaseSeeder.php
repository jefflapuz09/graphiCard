<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(CompanyInfoSeeder::class);
    }
}
