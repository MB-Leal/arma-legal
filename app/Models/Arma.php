<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Arma extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome',
        'img1',
        'img2',
        'img3',
        'fabricante',
        'tipo',
        'calibre',
        'acabamento',
        'capacidade_tiro',
        'sistema_funcionamento',
        'qtd_cano',
        'comprimento_cano',
        'tipo_alma',
        'qtd_raias',
        'sentido_raias',
        'pais_fabricacao',
        'preco',
        'taxa',
        'situacao',
        'quantidade',
        'estoque_min'
    ];

}
