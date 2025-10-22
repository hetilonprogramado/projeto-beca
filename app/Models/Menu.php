<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nome', 'user_deleted_id','deleted_at', 'status_id', 'user_id', 'rota', 'icone', 'tipo'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    function status()
    {
        return $this->belongsTo('App\Status');
    }
}
