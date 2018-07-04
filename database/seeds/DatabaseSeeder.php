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
        // $this->call(UsersTableSeeder::class);
        DB::table('customer')->insert([
            'fname' => 'Roy',
            'lname' => 'Doe',
            'email' => 'kiran.boddu@valuelabs.com',
            'gender' => '1',
            'country' => 'India',
            'state' => 'Andhra',
            'city' => 'Vijayawada',            
            'address' => 'KPHP',
            'phone' => '7829998208',
            'password' => encrypt('password'),
            'countrycode' => '+91',
            'role' => 1,
            'status' => 1
        ]);
    }
}
