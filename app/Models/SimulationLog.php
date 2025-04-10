<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 */
class SimulationLog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'property_value', 'date'];
}
