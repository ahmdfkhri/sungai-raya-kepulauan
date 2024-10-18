<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleContent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['berita', 'informasi']),
            'tag' => $this->faker->randomElement(['kesehatan', 'kegiatan', 'keuangan', 'perikanan']),
            'views' => $this->faker->numberBetween(0, 10000),
            'published_at' => $this->faker->optional()->dateTimeBetween('-5 years'),
        ];
    }
}
