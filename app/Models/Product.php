<?php

namespace App\Models;

use App\Queries\ProductQuery;
use Database\Factories\ProductFactory;
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
 *
 * @method static ProductFactory factory($count = null, $state = [])
 * @method static ProductQuery|Product query()
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'price',
        'amount',
    ];

    // Relations

    function properties(): BelongsToMany
    {
        return $this->belongsToMany(
            Property::class,
            'product_property_pivot',
        );
    }

    // Misc

    function newEloquentBuilder($query): ProductQuery
    {
        return new ProductQuery($query);
    }
}
