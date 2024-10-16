<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipe' => $this->faker->randomElement(['visi', 'misi']),
            'desc' => $this->faker->sentence(30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

