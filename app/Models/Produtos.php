<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'empresa_id',
        'grup_prod_id',
        'nome',
        'vlr_compra',
        'vlr_venda',
        'estoque_minimo',
        'codigo_barras',
        'status_id',
        'user_id',
        'user_deleted_id',
        'grupo_fiscal_id',
        'grupo_produto_id',
        'utilizacao',
        'ncm',
        'combo',
        'imagem'
    ];

    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}
