<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Food, travel, Medical 
        DB::table('categories')->insert([
            [
                'name' => 'Food',
                'image' => 'categories/pizza.png',
            ],
            [
                'name' => 'Work',
                'image' => 'categories/computer-worker.png',
            ],
            [
                'name' => 'Travel',
                'image' => 'categories/travel.png',
            ],
            [
                'name' => 'Health',
                'image' => 'categories/hospital.png',
            ],
        ]);
    }
}
