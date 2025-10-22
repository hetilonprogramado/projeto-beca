<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoProdutos extends Model
{
    protected $table = 'grupos_produtos';

    protected $fillable = [
        'nome',
        'status_id',
        'lucro',
        'user_id',
        'empresa_id',
        'comissao',
        'user_deleted_id'
    ];

    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}

