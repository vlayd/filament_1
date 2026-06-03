<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(-10000, 10000),
            'stock' => fake()->numberBetween(-10000, 10000),
            'benefits' => '{}',
            'sort' => fake()->numberBetween(-10000, 10000),
            'vip' => fake()->boolean(),
            'active' => fake()->boolean(),
        ];
    }
}
