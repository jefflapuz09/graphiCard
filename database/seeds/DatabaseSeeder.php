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
        $this->call(userEmployeeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(CompanyInfoSeeder::class);
        $this->call(ServiceItemSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(BannerSeeder::class);
        
    }
}
