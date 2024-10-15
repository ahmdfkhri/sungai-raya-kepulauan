<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berinf;

class BerinfSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data di tabel berinf beserta content
        Berinf::factory()->count(10)->create();
    }
};
