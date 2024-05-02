<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discounted_price' => 0,
            'is_discounted' => false,
            'is_sold_out' => false,
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Assign a brand to the product
            $brand = Brand::whereHas('category', function ($query) {
                $query->inRandomOrder()->limit(1);
            })->inRandomOrder()->first();

            $product->brand()->associate($brand)->save();
        });
    }
}
