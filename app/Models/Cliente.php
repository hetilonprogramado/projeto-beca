<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statues;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'endereco',
        'data_nasc',
        'cpf_cnpj',
        'email',
        'telefone',
        'status',
        'foto'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
