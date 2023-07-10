<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sacado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'codigo_sacado',
        'cnpj',
        'razao_social',
        'tipo_inscricao',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'numero',
        'complemento',
        'ddd_telefone',
        'ramal',
        'nome_contato',
        'email',
        'status',
        'comprador_autorizado',
        'rg',
        'orgao_emissor',
        'uf_emissor',
        'cpf',
        'cargo',
    ];
}
