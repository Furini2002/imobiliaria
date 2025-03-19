<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteStatistics extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['start_time', 'end_time', 'origin', 'device', 'date'];

}
