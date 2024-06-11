<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\ProductsController;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use DatabaseTransactions;

    function testIndexShouldNotFail(): void
    {
        $this->getJson(route('products.index'))
            ->assertSuccessful()
            ->assertJsonCount(ProductsController::PER_PAGE, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'price', 'amount'],
                ],
            ]);
    }

    function testIndexFiltersByProperties(): void
    {
        $product = Product::factory()->withProperties()->create()->loadMissing('properties.values');
        $properties = $product->properties;
        // Apply all properties values to filter
        $filters = $properties
            ->keyBy('title')
            ->map(fn(Property $p) => $p->values->pluck('value')->toArray())
            ->toArray();

        $this->getJson(route('products.index', ['properties' => $filters]))
            ->assertSuccessful()
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment([
                'id' => $product->id,
                'price' => $product->price,
                'amount' => $product->amount,
            ]);
    }
}
