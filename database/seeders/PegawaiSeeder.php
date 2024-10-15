<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Pegawai::factory()->count(5)->create();
    }
};
