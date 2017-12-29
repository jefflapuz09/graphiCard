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
            'description' => '<p>Want to personalize your item? We can print personalized designs for you! Just order the items here, then send us your design.</p>
                              <p>Want something for a simple present this christmas, a customized one that will really appreciate someone when they received it. Call us now at #graphicard with telephone number (02) 709-2099/ 0933-923-6785.</p>
                              <p>Think of your own design and we will do it for you.</p>',
            'services_offered' => 'Digital and Offset Printing, Large Format Printing, Photography, ID Cards, Novelty Items, Xerox, Risograph, T-Shirt printing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
