<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data di tabel content
        Content::factory()->count(10)->create();
    }
}
