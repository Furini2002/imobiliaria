<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['name', 'text', 'photo', 'status', 'city_id'];

    public function city():BelongsTo
    {
        return $this->belongsTo(City::class);
    }


}
