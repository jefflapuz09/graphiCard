<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'AM Coronado',
            'email' => 'hongkaira@gmail.com',
            'password' => bcrypt('passw0rd'),
            'role' => 1,
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Jefferson Lapuz',
            'email' => 'jeff.lapuz09@gmail.com',
            'password' => bcrypt('passw0rd'),
            'role' => 1,
            'isActive' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
