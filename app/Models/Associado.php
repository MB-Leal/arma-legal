<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Associado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cpf',
        'matricula',
        'nome',
        'situacao',
        'posto_graduacao',
        'email',
        'rg',
        'opm',
        'logradouro',
        'bairro',
        'municipio',
        'complemento',
        'cep',
        'numero',
        'estado',
        'celular',
    ];

    public function requerimento(): BelongsTo
    {
        return $this->belongsTo(Requerimento::class);
    }
}
