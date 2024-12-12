<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 5000;
        $limit = 500000;

        for ($i = 0; $i < $limit; $i += $chunk) {
            $ratings = Rating::factory()->count($chunk)->make();
            Rating::insert($ratings->toArray());
        }
    }
}
