<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail(string $id)
 */
class SiteStatistics extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['start_time', 'end_time', 'origin', 'device', 'date'];

}
