<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     protected $model = Book::class;

     public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'category_id' => fake()->numberBetween(1, 3000),
            'author_id' => fake()->numberBetween(1, 1000),
        ];
    }
}
