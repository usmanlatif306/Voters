<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voter>
 */
class VoterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $blocks = ["160060501", "160060502"];
        $genders = ["Male", "Female"];
        return [
            'block' => $blocks[array_rand($blocks, 1)],
            'serial_number' => fake()->numberBetween(1, 2000),
            'family_number' => fake()->numberBetween(1, 350),
            'name' => fake()->name(),
            'father_name' => fake()->name(),
            'cnic' => fake()->numberBetween(11111111111111, 99999999999999),
            'gender' => $genders[array_rand($genders, 1)]
        ];
    }
}
