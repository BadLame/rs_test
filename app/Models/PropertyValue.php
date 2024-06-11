<?php

namespace App\Models;

use Database\Factories\PropertyValueFactory;
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
 *
 * @method static PropertyValueFactory factory($count = null, $state = [])
 */
class PropertyValue extends Model
{
    use HasFactory;

    protected $table = 'property_values';

    protected $fillable = [
        'value',
    ];

    // Relations

    function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
