<?php

namespace Database\Factories;

use App\Models\AnimalTypology;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal_typology_id' => fake()->randomElement(AnimalTypology::pluck('id')),
            'name' => fake('it_IT')->unique()->word()
        ];
    }
}
