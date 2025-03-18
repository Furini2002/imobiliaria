<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    //para criar dados ficticios
    use HasFactory;

    protected $fillable = ['nome', 'texto', 'foto', 'status', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }


}
