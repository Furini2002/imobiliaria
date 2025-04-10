<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 * @method static inRandomOrder()
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'address',
        'features', 'price', 'bedrooms',
        'bathrooms', 'land_area', 'built_area',
        'views', 'leads_generated', 'last_update',
        'status_id', 'type_id', 'city_id',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
