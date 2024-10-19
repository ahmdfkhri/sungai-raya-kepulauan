<?php

namespace Database\Seeders;

use App\Models\PublicDocuments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PublicDocuments::factory(40)-> create();
    }
}
