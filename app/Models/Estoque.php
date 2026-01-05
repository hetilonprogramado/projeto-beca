<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estoque extends Model
{
    protected $table = 'estoques';

    protected $fillable = [
        'codigo_barra',
        'quantidade',
        'data',
        'tipo_de_movimento',
        'produto_id',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto', 'produto_id');
    }

}
