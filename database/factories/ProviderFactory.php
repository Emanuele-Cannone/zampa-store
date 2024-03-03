<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->countryCode(),
            'fiscal_code' => fake()->unique()->randomNumber(9),
            'p_iva' => fake()->unique()->name,
            'iban' => fake()->iban,
            'email' => fake()->unique()->email,
            'pec' => fake()->unique()->email,
            'telephone' => fake()->phoneNumber,
            'other_contact' => fake()->phoneNumber
        ];
    }
}
