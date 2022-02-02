<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Alya Harniza',
            'email' => 'alyaaharniza@gmail.com',
            'password' => bcrypt('123123'),
            'remember_token' => 'asdfasdf'
        ]);
    }
}
