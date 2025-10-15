<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuarios extends Model
{
    protected $table = 'grupo_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'status_id',
        'user_id'
    ];

    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}
