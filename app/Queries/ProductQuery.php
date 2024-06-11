<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

class ProductQuery extends Builder
{
    /**
     * @param array|null $properties Key - property name, value - array of property values
     * @return $this
     */
    function filterByProperties(?array $properties): self
    {
        foreach ((array)$properties as $property => $values) {
            foreach ((array)$values as $value) {
                $this->whereHas(
                    'properties',
                    fn(Builder $propertiesQuery) => $propertiesQuery
                        ->where('title', $property)
                        ->whereHas(
                            'values',
                            fn(Builder $valuesQuery) => $valuesQuery->where('value', $value)
                        )
                );
            }
        }

        return $this;
    }
}
