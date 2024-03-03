<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => fake()->numberBetween(1,30),
            'name' => fake()->firstName,
            'species' => fake()->randomElement(['cane','gatto','pesce','uccello','topo']),
            'breed' => fake()->word,
            'birth' => fake()->date(),
            'is_sterilized' => fake()->boolean
        ];
    }


}
