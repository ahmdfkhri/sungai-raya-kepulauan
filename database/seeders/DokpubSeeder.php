<?php

namespace Database\Seeders;

use App\Models\Dokpub;
use Illuminate\Database\Seeder;

class DokpubSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 data dummy untuk tabel dokpub
        Dokpub::factory()->count(5)->create();
    }
};


