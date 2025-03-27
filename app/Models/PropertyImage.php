<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 * @method static where(string $string, string $propertyId)
 */
class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'property_id'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
