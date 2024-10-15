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
            'values' => $this->faker->sentence(),  // Data untuk kolom 'values'
            'type' => $this->faker->randomElement(['text', 'image', 'video']),  // Data untuk kolom 'type'
            'order' => $this->faker->numberBetween(1, 10),  // Data untuk kolom 'order'
        ];
    }
};

