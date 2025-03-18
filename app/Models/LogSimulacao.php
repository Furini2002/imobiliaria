<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSimulacao extends Model
{
    use HasFactory;

    protected $fillable =['nome', 'email', 'valor_imovel', 'data'];
}
