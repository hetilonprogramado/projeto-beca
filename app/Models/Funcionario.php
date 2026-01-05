<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'phone',
        'cargo',
        'email',
        'salario',
        'admissao',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
