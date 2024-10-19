<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\OrgChart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::factory(20)->create();

        foreach ($employees as $e) {
            OrgChart::factory()->create([
                'employee_id' => $e->id,
            ]);
        }
        
    }
}
