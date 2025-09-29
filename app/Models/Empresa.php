<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['razao_social', 'nome_fantasia', 'cnpj', 'cr', 'telefone', 'endereco'];
}
