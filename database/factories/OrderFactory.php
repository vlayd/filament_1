<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_number' => fake()->word(),
            'total_amount' => fake()->numberBetween(-10000, 10000),
            'payment_method' => fake()->word(),
            'payment_status' => fake()->word(),
            'payment_id' => fake()->word(),
            'payment_qr_code_image' => fake()->text(),
            'payment_qr_code_payload' => fake()->text(),
            'payment_qr_code_expiration_date' => fake()->dateTime(),
            'paid_at' => fake()->dateTime(),
        ];
    }
}
