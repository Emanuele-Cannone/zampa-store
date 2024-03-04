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
            'company_name' => fake('it_IT')->company(),
            'address' => fake('it_IT')->address(),
            'city' => fake('it_IT')->city(),
            'postal_code' => fake('it_IT')->postcode(),
            'country' => fake()->countryCode(),
            'fiscal_code' => fake()->unique()->randomNumber(9),
            'p_iva' => fake()->unique()->randomNumber(9),
            'iban' => fake()->iban,
            'email' => fake()->unique()->safeEmail,
            'pec' => fake()->unique()->safeEmail,
            'telephone' => fake('it_IT')->phoneNumber,
            'other_contact' => fake('it_IT')->phoneNumber
        ];
    }
}
