<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipos_Contas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipos_contas';

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
    protected $fillable = ['id','nome', 'user_id', 'status_id', 'empresa_id','user_deleted_id','updated_x','deleted_at', 'tipo'];
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    function status() {
        return $this->belongsTo('App\status');
    }
}
