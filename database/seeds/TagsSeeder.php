<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Personal']);
        Tag::create(['name' => 'Traveling']);
        Tag::create(['name' => 'Food']);
        Tag::create(['name' => 'Health']);
        Tag::create(['name' => 'Fashion']);
    }
}
