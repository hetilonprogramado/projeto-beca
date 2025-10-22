<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargos extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['nome', 'status_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function status()
    {
        return $this->belongsTo('App\Status');
    }
}
