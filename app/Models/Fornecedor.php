<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'cnpj',
        'phone',
        'email',
        'contato',
        'address',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
