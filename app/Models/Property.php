<?php

namespace App\Models;

use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * @property Collection<PropertyValue> $values
 *
 * @method static PropertyFactory factory($count = null, $state = [])
 */
class Property extends Model
{
    use HasFactory;

    const string PRODUCT_TITLE_VAL = 'title';

    protected $table = 'properties';

    protected $fillable = [
        'title',
    ];

    // Relations

    function values(): HasMany
    {
        return $this->hasMany(PropertyValue::class, 'property_id');
    }
}
