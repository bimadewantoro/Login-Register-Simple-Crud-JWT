<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'kategori' => $this->faker->randomElement(['Kesehatan', 'Pendidikan', 'Lingkungan', 'Sosial', 'Ekonomi']),
            'user_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
