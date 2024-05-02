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
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'user_id' => $this->faker->numberBetween(1, 20),
            'purchase_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Purchase $purchase) {
            // Assign random products to the purchase
            $products = Product::inRandomOrder()->limit(rand(1, 5))->get();
            $purchase->products()->attach($products);
        });
    }
}
