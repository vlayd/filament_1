<?php

namespace Database\Factories;

use App\Models\EventDay;
use App\Models\Speaker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_day_id' => EventDay::factory(),
            'speaker_id' => Speaker::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'confirmed' => fake()->boolean(),
        ];
    }
}
