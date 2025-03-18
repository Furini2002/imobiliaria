<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['nome', 'estado'];

    //relacionamento: uma ciadde tem muitos imoveis (UM PARA MUITOS)
    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }

    //relacionamento: uma cidade tem muitos depoimentos (UM PARA MUITOS)
    public function depoimentos()
    {
        return $this->hasMany(Depoimento::class);
    }
}
