<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemImovel extends Model
{
    use HasFactory;
    protected $fillable = ['caminho_imagem', 'imagem_id'];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
