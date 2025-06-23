<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'tahun_rilis' => $this->faker->numberBetween(1980, date('Y')),
            'sutradara' => $this->faker->name(),
            'genre' => json_encode(
                $this->faker->randomElements(
                    ['Action','Drama','Sci-Fi','Comedy','Thriller','Romance'],
                    $this->faker->numberBetween(1, 3)
                )
            ),
            'aktor' => json_encode(
                $this->faker->randomElements(
                    [
                        'Leonardo DiCaprio', 'Tom Hardy', 'Christian Bale',
                        'Heath Ledger', 'Scarlett Johansson', 'Meryl Streep', 'Brad Pitt'
                    ],
                    $this->faker->numberBetween(1, 4)
                )
            ),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
