<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'property_id'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
