<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_infos')->insert([
            'company_logo' => 'img\logo2.png',
            'company_name' => 'Graphicard',
            'street' => 'Third Floor Arcade, 873 Aurora Blvd. cor. St. Mary St.',
            'brgy' => 'Cubao',
            'city' => 'Quezon City, Philippines',
            'contactNumber' => '0911-123-4567',
            'emailAddress' => 'graphicard@gmail.com',
            'about' => 'Offers digital printing and offset printing',
            'description' => '',
            'services_offered' => 'Digital Printing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
