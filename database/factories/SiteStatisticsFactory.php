<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteStatistics>
 */
class SiteStatisticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->time('H:i:s');
        $endTime = $this->faker->time('H:i:s');

        return [
            'start_time' => $startTime,
            'end_time' => $endTime > $startTime ? $endTime : $startTime,
            'origin' => $this->faker->url(),
            'device' => $this->faker->word(),
            'date' => $this->faker->date(),
        ];
    }
}
