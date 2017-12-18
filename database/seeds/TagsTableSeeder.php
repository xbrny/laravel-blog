<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::updateOrCreate(['name' => 'HTML 5']);
        Tag::updateOrCreate(['name' => 'CSS 3']);
        Tag::updateOrCreate(['name' => 'Wordpress']);
    }
}
