<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 1000;
        $limit = 100;

        $authors = Author::factory()->count($chunk)->make();

        $authors->chunk($limit)->each(function ($chunk) {
            Author::insert($chunk->toArray());
        });
    }
}
