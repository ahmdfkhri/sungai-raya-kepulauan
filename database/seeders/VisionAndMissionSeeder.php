<?php

namespace Database\Seeders;

use App\Models\VisionAndMission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisionAndMissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisionAndMission::factory()->create([
            'type' => 'vision',
            'order' => 0
        ]);

        for ($i=0; $i < 10; $i++) { 
            VisionAndMission::factory()->create([
                'type' => 'mission',
                'order' => $i,
            ]);
        }
    }
}
