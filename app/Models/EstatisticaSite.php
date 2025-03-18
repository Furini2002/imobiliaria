<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatisticaSite extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['hora_inicio', 'hora_fim', 'origem', 'dispositivo', 'data'];


}
