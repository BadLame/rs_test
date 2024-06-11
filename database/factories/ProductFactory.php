<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    function definition(): array
    {
        return [
            'price' => fake()->randomFloat(2, 10, 10_000),
            'amount' => rand(0, 100_000),
        ];
    }

    function configure(): self
    {
        return $this->afterCreating(
            fn(Product $product) => $product->properties()->save(
                Property::factory()->title()->create()
            )
        );
    }

    function withProperties(): self
    {
        return $this->afterCreating(
            fn(Product $product) => $product->properties()->saveMany(
                Property::factory(rand(1, 2))->withMultipleValues()->create()
            )
        );
    }
}
