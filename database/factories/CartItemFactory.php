<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => ((int)fake()->randomFloat(2, 1, 10)),
            'price' => 1,
            'cart_id' => Cart::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id
        ];
    }
}
