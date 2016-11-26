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
        	'name' => 'bob',
        	'password' => '1',
        	'email' => 'example' . '@example.com',
        	'user_balance' => 0,
        	'user_level' => 1,
        	]);
    }
}
