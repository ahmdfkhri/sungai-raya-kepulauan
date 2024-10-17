<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berinf;
use App\Models\Content;

class BerinfContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 10 Berinf records, masing-masing dengan 3 Content records
        Berinf::factory(10)
            ->has(Content::factory()->count(3), 'contents') // asumsikan relasi hasMany di model
            ->create();
    }
}
