<?php

namespace Database\Factories;

use App\Models\Dokpub;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokpubFactory extends Factory
{
    protected $model = Dokpub::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(3), // Judul dengan 3 kata
            'tahun' => $this->faker->year, // Tahun acak
        ];
    }
};
