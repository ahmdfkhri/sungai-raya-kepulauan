<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicDocuments>
 */
class PublicDocumentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title =  $this->faker->sentence(10);
        $file_type = $this->faker->randomElement(['pdf', 'docx', 'doc', 'xls', 'xlsx']);
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(5),
            'year' => $this->faker->dateTimeBetween('-5 years')->format('Y'),
            'file_path' => Str::slug($title). '.' . $file_type,
            'file_type' => $file_type,
            'created_at' => $this->faker->dateTimeBetween('-5 years')
        ];
    }
}
