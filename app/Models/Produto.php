<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'categoria',
        'codigo',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
