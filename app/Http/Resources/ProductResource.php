<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    function toArray(Request $request): array
    {
        /** @var Product $product */
        $product = $this->resource;

        return [
            'id' => $product->id,
            'amount' => $product->amount,
            'price' => $product->price,

            'title' => $this->whenLoaded(
                'properties',
                function () use ($product) {
                    /** @var Property|null $titleProperty */
                    $titleProperty = $product->properties
                        ->firstWhere('title', Property::PRODUCT_TITLE_VAL);

                    return $titleProperty?->relationLoaded('values')
                        ? $titleProperty->values->value('value')
                        : '';
                }
            ),
            'properties' => $this->whenLoaded('properties'),
        ];
    }
}
