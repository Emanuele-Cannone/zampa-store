<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ean_code' => fake()->unique()->numerify,
            'product_code' => fake()->unique()->numerify,
            'description' => fake()->words(5,true),
            'min_quantity' => fake()->numberBetween(0,999),
            'is_active' => fake()->boolean,
            'in_order' => 0
        ];
    }
}
