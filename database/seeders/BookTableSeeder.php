<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batch = 1000;
        $totalBatch = 100000;

        for ($i = 0; $i < $totalBatch / $batch; $i++) {
            $data = Book::factory()->count($batch)->make()->toArray();
            Book::insert($data);
        }
    }
}
