<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition()
    {
        return [
            'values' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['teks', 'foto']),
            'order' => $this->faker->numberBetween(1, 10),
            'berinf_id' => \App\Models\Berinf::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
};
