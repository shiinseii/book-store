<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     protected $model = Rating::class;
    
     public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(1, 10),
            'book_id' => fake()->numberBetween(1, 100000),
        ];
    }
}
