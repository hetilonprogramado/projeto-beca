<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    protected $fillable = [
        'empresa_id',
        'nome',
        'cpf',
        'rg',
        'sexo',
        'status_id',
        'user_system',
        'user_deleted_id',
        'user_id',
        'senha_compra',
        'rua',
        'numero',
        'cep',
        'bairro',
        'cidade_id',
        'estado_id',
        'data_admissao',
        'data_demissao',
        'telefone1',
        'telefone2',
        'salario',
        'cargo',
        'pis',
        'ctps',
        'data_nascimento',
        'nome_mae'
    ];

    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }
}
