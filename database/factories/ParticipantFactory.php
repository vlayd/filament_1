<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'document' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->word(),
            'address_number' => fake()->word(),
            'complement' => fake()->word(),
            'province' => fake()->word(),
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'state' => fake()->word(),
            'external_reference' => fake()->word(),
            'asaas_customer_id' => fake()->word(),
        ];
    }
}
