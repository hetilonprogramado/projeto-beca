<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
