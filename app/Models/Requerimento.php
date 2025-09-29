<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requerimento extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id', 'codigo', 'arma', 'numero_parcelas', 'valor_mensal', 'valor_total', 'associado_id', 'data_requerimento'];

    public function associado(): HasMany
    {
        return $this->hasMany(Associado::class);
    }
}
