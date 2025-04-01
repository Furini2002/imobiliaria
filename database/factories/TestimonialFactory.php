<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'city_id' => City::inRandomOrder()->first()->id,
            'text' => $this->faker->paragraph(),
            'photo' => $this->faker->imageUrl(200, 200, 'people', true, 'Profile'),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
        ];
    }
}
