<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'category_name' => 'Video',
        	'category_description' => 'Video on Website',
        	'order_number' => '1',
        	'number_of_products' => 1,
        	'avatar' => 'default.png'
        	]);
    }
}
