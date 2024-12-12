<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batch = 1000;
        $totalBatch = 500000;

        for ($i = 0; $i < $totalBatch / $batch; $i++) {
            $data = Rating::factory()->count($batch)->make()->toArray();
            Rating::insert($data);
        }
    }
}
