<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(['umum', 'teknis', 'lainnya']),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(12),
        ];
    }
}
