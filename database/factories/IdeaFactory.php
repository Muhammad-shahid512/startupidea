<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
     'title' => $this->faker->sentence(4),
    'description' => $this->faker->paragraph(2),
    'user_id' => $this->faker->randomElement([2, 4]),
    'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
    'updated_at' => now(),
    'date'=>now()
        ];
    }
}
