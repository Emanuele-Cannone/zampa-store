<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProviderInvoice>
 */
class ProviderInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider_id' => fake()->randomElement(Provider::pluck('id')),
            'amount' => fake()->numberBetween(0.00, 999.99),
            'date' => fake()->date,
            'paid' => fake()->boolean,
            'number' => fake()->numerify
        ];
    }
}
