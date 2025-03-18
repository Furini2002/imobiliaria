<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'logradouro',
        'caracteristicas', 'valor', 'quartos',
        'banheiros', 'area_terreno', 'area_construida',
        'visualizacoes', 'leads_gerados', 'ultima_atualizacao',
        'status_id', 'tipo_id', 'cidade_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);

    }

    public function imagens()
    {
        return $this->hasMany(ImagemImovel::class);

    }
}
