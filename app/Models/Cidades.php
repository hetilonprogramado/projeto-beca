<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    protected $table = 'cidades';

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'estado_id');
    }
}
