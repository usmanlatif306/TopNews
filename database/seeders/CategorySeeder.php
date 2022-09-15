<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['top', 'politics', 'business', 'sports', 'entertainment', 'science', 'health', 'technology', 'food'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
