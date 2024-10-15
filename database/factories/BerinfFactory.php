<?php

namespace Database\Factories;

use App\Models\Berinf;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class BerinfFactory extends Factory
{
    protected $model = Berinf::class;

    public function definition()
    {
        return [
            'foto' => $this->faker->imageUrl(),  // Data untuk kolom 'foto'
            'judul' => $this->faker->sentence(),  // Data untuk kolom 'judul'
            'hight' => $this->faker->boolean(),  // Data untuk kolom 'hight'
            'content_id' => Content::factory(),  // Relasi dengan tabel 'content'
        ];
    }
};

