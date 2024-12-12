<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 3000;
        $limit = 1000;

        $categories = Category::factory()->count($chunk)->make();

        $categories->chunk($limit)->each(function ($chunk) {
            Category::insert($chunk->toArray());
        });
    }
}
