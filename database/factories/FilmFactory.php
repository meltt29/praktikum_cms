<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                    'judul' => $this->faker->sentence(3), 
        'tahun_rilis' => $this->faker->year(),
        'sutradara' => $this->faker->name(),
        'genre' => $this->faker->randomElements(
            ['Action', 'Drama', 'Sci-Fi', 'Comedy', 'Thriller', 'Romance'], 
            $this->faker->numberBetween(1, 3), 
            false
        ),
        'aktor' => $this->faker->randomElements(
            [
                'Leonardo DiCaprio', 'Tom Hardy', 'Christian Bale', 
                'Heath Ledger', 'Scarlett Johansson', 'Meryl Streep', 'Brad Pitt'
            ], 
            $this->faker->numberBetween(1, 4), 
            false
        ),
        'created_at' => now(),
        'updated_at' => now(),
            
        ];
    }
}
