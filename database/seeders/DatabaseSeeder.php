<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
        $this->call([
            CitySeeder::class,
            StatusSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
            TestimonialSeeder::class,
            SimulationLogSeeder::class,
            SiteStatisticsSeeder::class,
>>>>>>> refactor/estrutura-laravel-nova
        ]);
    }
}
