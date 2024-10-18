<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleContent>
 */
class ArticleContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ($this->faker->randomElement(['image', 'text']));
        return [
            'article_id' => 0,
            'type' => $type,
            'value' => $type === 'image' ? $this->faker->imageUrl() : $this->faker->paragraph,
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }

    // State untuk konten tipe gambar
    public function image()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'image',  // Ubah tipe menjadi 'image'
                'value' => $this->faker->imageUrl(),  // Generate URL gambar
            ];
        });
    }

    // State untuk konten tipe teks
    public function text()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'text',  // Ubah tipe menjadi 'text'
                'value' => $this->faker->paragraph(),  // Generate paragraf teks
            ];
        });
    }
}
