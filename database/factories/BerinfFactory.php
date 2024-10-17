<?php

namespace Database\Factories;

use App\Models\Berinf;
use Illuminate\Database\Eloquent\Factories\Factory;

class BerinfFactory extends Factory
{
    protected $model = Berinf::class;

    public function definition()
    {
        return [
            'thumbnail' => $this->faker->imageUrl(640, 480, 'business', true, 'Faker'),
            'title' => $this->faker->sentence(),
            'category' => $this->faker->word(),
            'views' => $this->faker->numberBetween(0, 1000),
            'highlight' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
};
