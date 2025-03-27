<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 */
class Status extends Model
{
    use HasFactory;

    protected $fillable =['description'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
