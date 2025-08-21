<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'empresa_id',
        'rsocial_nome',
        'nfantasia_apelido',
        'status_id',
        'user_id',
        'rua',
        'numero',
        'cep',
        'bairro',
        'estado_id',
        'cidade_id',
        'data_abert_nasc',
        'tipo_pessoa',
        'cnpj_cpf',
        'ie_rg',
        'email',
        'sexo',
        'fornecedor',        
        'token_acesso',
        'user_deleted_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
}
