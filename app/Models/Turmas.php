<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turmas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'turmas';

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
    protected $fillable = ['id', 'empresa_id', 'nome', 'curso_id', 'sala_id','valor','data_inicial','data_final','status_id','carga_hr', 'user_id', 'user_deleted_id','exibir_data_final','validar_acesso','recorrente','updated_x', 'tipo_conta_id','data_encerrar_lancamento'];
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    function status() {
        return $this->belongsTo('App\status')->withTrashed();
    }
    
    function cursos() {
        return $this->belongsTo('App\curso','curso_id','id')->withTrashed();
    }
    
    function salas() {
        return $this->belongsTo('App\sala','sala_id','id')->withTrashed();
    }
    
    function turnos() {
        return $this->belongsTo('App\turnos','turno_id')->withTrashed();
    }

    function tipo_contas() {
        return $this->belongsTo('App\tipo_contas','tipo_conta_id')->withTrashed();
    }
}
