<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;

    public function definition()
    {
        return [
            'nama_pegawai' => $this->faker->name,
            'jabatan' => $this->faker->word,
            'foto' => $this->faker->imageUrl(),
            'level' => $this->faker->randomElement([1,2,3]),
        ];
    }
};


