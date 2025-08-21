<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cursos';

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
    protected $fillable = ['id', 'empresa_id','user_id', 'user_deleted_id', 'updated_x','deleted_at', 'nome', 'status_id','tipo_lancamento','hora_aula','extracurricular', 'nivel_id'];
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    function status() {
        return $this->belongsTo('App\status');
    }
    
    function nivel() {
        return $this->belongsTo('App\nivel');
    }
}
