<?php

namespace Database\Seeders;

use App\Models\SimulationLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimulationLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SimulationLog::factory()->count(30)->create();
    }
}
