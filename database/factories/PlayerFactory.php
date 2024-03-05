<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = [
            'Forward',
            'Midfielder',
            'Defender',
            'Goalkeeper'
        ];

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'position' => fake()->randomElement($positions),
            'salary' => fake()->randomFloat(),
        ];
    }
}
