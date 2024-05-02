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
            'category_id' => $this->faker->randomNumber(1, 3),
            'brand_id' => $this->faker->randomNumber(1, 20),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discounted_price' => 0,
            'is_discounted' => false,
            'is_sold_out' => false,
        ];
    }
}
