<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mladen',
            'email' => 'jelovacmladen@gmail.com',
            'password' => bcrypt('admin91'),
        ]);
    }
}
