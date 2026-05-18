<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),

            'director' => fake()->name(),

            'genre' => fake()->randomElement([
                'action',
                'comedy',
                'drama',
                'horror',
                'sci-fi',
            ]),

            'format' => fake()->randomElement([
                'dvd',
                'digital',
            ]),

            'location' => fake()->randomLetter(),

            'price' => fake()->numberBetween(10000, 50000),

            'quantity' => fake()->numberBetween(1, 100),

            'quantity_views' => fake()->numberBetween(0, 10000),

            'file_name' => fake()->imageUrl(),

            'classification' => fake()->randomElement([
                'g',
                'pg',
                'pg-13',
                'r',
            ]),

            'year' => fake()->year(),

            'description' => fake()->paragraph(),

            'trailer_link' => fake()->url(),
        ];
    }
}
