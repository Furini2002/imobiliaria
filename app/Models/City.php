<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 * @method static inRandomOrder()
 */
class City extends Model
{
   use HasFactory;

    protected $fillable = ['name', 'state'];

    //relacionamento: uma ciadde tem muitos imoveis (UM PARA MUITOS)
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    //relacionamento: uma cidade tem muitos depoimentos (UM PARA MUITOS)
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
