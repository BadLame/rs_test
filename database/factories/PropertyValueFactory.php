<?php

namespace Database\Factories;

use App\Models\PropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PropertyValue>
 */
class PropertyValueFactory extends Factory
{
    function definition(): array
    {
        return [
            'property_id' => PropertyFactory::new(),
            'value' => fake()->colorName(),
        ];
    }
}
