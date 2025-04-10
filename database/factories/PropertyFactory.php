<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\PropertyType;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'features' => $this->faker->text(100),
            'price' => $this->faker->randomFloat(2, 50000, 1000000),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'land_area' => $this->faker->randomFloat(2, 100, 1000),
            'built_area' => $this->faker->randomFloat(2, 80, 500),
            'city_id' => City::inRandomOrder()->first()?->id ?? City::factory(),
            'status_id' => Status::inRandomOrder()->first()?->id ?? Status::factory(),
            'type_id' => PropertyType::inRandomOrder()->first()?->id ?? PropertyType::factory(),
        ];
    }
}
