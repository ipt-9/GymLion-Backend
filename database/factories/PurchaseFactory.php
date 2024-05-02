<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 50),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'purchase_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
