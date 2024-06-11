<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;

    function definition(): array
    {
        return [
            'title' => fake()->company(),
        ];
    }

    function title(): self
    {
        return $this->state(['title' => Property::PRODUCT_TITLE_VAL])
            ->afterCreating(
                fn(Property $property) => PropertyValue::factory()->create([
                    'value' => '[Title] ' . fake()->colorName(),
                    'property_id' => $property->id,
                ]));
    }

    function withMultipleValues(): self
    {
        return $this->afterCreating(
            fn(Property $property) => PropertyValue::factory(rand(2, 4))->create([
                'property_id' => $property->id,
            ])
        );
    }
}
