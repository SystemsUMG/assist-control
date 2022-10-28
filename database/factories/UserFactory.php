<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'tuition' => rand(1000, 9999),
            'phone' => $this->faker->phoneNumber(),
            'status' => 1,
            'type' => 'admin',
            'remember_token' => Str::random(10),
        ];
    }
}
