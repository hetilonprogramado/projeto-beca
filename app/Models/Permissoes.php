<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissoes extends Model
{
    protected $table = 'permissoes';

    protected $fillable = [
        'grupos_user_id',
        'menu_id',
        'status_id',
    ];

    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function status()
    {
        return $this->belongsTo('App\Status');
    }

    function grupos_user()
    {
        return $this->belongsTo('App\Models\GruposUser', 'grupos_user_id');
    }

    function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id');
    }
}
