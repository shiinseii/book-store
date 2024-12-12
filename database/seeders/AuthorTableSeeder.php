<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batch = 500;
        $totalBatch = 1000;

        for ($i = 0; $i < $totalBatch / $batch; $i++) {
            $data = Author::factory()->count($batch)->make()->toArray();
            Author::insert($data);
        }
    }
}
