<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statues;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'empresa_id',
        'nome',
        'apelido',
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
        'cpf',
        'rg',
        'email',
        'sexo',
        'fornecedor',        
        'token_acesso',
        'user_deleted_id',
        'registro_nascimento',
        'nacionalidade',
        'naturalidade',
        'religiao'
    ];

    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
}
