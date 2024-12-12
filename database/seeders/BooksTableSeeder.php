<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 5000;
        $limit = 100000;

        // stuck saat pakai chunk(), namun berhasil melalui teknik for loop
        for ($i = 0; $i < $limit; $i += $chunk) {
            $books = Book::factory()->count($chunk)->make();
            Book::insert($books->toArray());
        }
    }
}
