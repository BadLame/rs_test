<?php

namespace App\Models;

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
 */
class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    // Relations

    function values(): HasMany
    {
        return $this->hasMany(PropertyValue::class, 'property_id');
    }
}
