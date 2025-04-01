<?php

namespace Database\Seeders;

use App\Models\SiteStatistics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteStatistics::factory()->count(30)->create();
    }
}
