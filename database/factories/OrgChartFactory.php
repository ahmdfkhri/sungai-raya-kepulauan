<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrgChart>
 */
class OrgChartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => 0,
            'position' => $this->faker->jobTitle(),
            'level' => $this->faker->numberBetween(0, 5),
        ];
    }
}
