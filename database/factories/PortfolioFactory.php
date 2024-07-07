<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // 'user_id' => fake()->unique()->numberBetween(1, User::count()),
            'user_id' => User::factory(),
            'name' => 'My Portfolio',
            'coins' => ''
        ];
    }
}
