<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VM; // pastikan VM adalah model yang terhubung dengan tabel 'v&m'

class VMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 5 rows of data using the factory
        VM::factory()->count(5)->create();
    }
}

