<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salas';

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
    protected $fillable = ['id', 'empresa_id','user_id', 'descricao', 'user_deleted_id','deleted_at','nome', 'limite', 'status_id'];

    
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id', 'id');
    }
}
