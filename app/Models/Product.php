<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property float $price
 * @property int $amount
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * @property Collection<Property> $properties
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // Relations

    function properties(): BelongsToMany
    {
        return $this->belongsToMany(
            Property::class,
            'product_property_pivot',
        );
    }
}
