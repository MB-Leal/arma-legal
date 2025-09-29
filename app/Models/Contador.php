<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nome','cpf', 'data_acesso', 'associado'];
}
