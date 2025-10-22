<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoUsuarios extends Model
{
    protected $table = 'grupo_users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'status_id',
        'user_id'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}
