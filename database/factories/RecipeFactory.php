<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'ingredients' => fake()->paragraph(),
            'instructions' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}
