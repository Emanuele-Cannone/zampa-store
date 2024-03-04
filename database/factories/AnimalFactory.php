<?php

namespace Database\Factories;

use App\Models\AnimalTypology;
use App\Models\Breed;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Query\Builder;


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
            'customer_id' => fake()->randomElement(Customer::pluck('id')),
            'breed_id' => fake('it_IT')->randomElement(Breed::pluck('id')),
            'name' => fake('it_IT')->firstName,
            'birth' => fake()->date(),
            'is_sterilized' => fake()->boolean
        ];
    }


}
