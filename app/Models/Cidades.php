<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidades extends Model
{
    protected $table = 'cidades';

    protected $fillable = ['nome', 'estado_id', 'ibge_code'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'estado_id');
    }
}
