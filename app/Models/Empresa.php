<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'rsocial',
        'nome_fantasia',
        'cnpj',
        'ie',
        'rua',
        'numero',
        'bairro',
        'estado_id',
        'cidade_id',
        'modulo_id',
        'email',
        'telefone1',
        'telefone2',
        'site',
        'logo',
        'token',
        'data_lib',
        'tipo_pessoa',
        'endereco',
        'cep',
        'status_id',
        'user_id',
        'regime_apuracao'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
