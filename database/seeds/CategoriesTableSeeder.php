<?php

use App\Category;
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
        Category::updateOrCreate(['name' => 'Personal']);
        Category::updateOrCreate(['name' => 'Front-end']);
        Category::updateOrCreate(['name' => 'Back-end']);
        Category::updateOrCreate(['name' => 'Finance']);
    }
}
