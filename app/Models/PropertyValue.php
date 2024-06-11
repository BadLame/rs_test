<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $property_id
 * @property string $value
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * @property Property $property
 */
class PropertyValue extends Model
{
    use HasFactory;

    protected $table = 'property_values';

    // Relations

    function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
