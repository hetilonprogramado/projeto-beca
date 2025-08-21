<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matriculas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'matriculas';

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
    protected $fillable = ['id','empresa_id','status_id','cliente_id','responsavel_id','curso_id','turma_id','sala_id','valor','desconto','data_cad','ordem','obs_carteira','aluno_curso','instituicao_anterior','user_id','ano_letivo','user_deleted_id','updated_x','deleted_at'];
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    function clientes() {
        return $this->belongsTo('App\cliente','cliente_id','id')->whereNull('clientes.deleted_at');
    }
    
    // function get_nota($cliente_id,$turma_id,$disciplina_id){
    //     $nota = lancamentos_nota::where('cliente_id',$cliente_id)->where('turma_id',$turma_id)->where('disciplina_id',$disciplina_id)->get();
    //     if(count($nota) > 0){
    //         return $nota[0]->media_final;
    //     }else{
    //         return 0;
    //     }
    // }
        
    function cursos() {
        return $this->belongsTo('App\curso','curso_id');
    }
    
    function salas() {
        return $this->belongsTo('App\sala','sala_id');
    }
    
    function turmas() {
        return $this->belongsTo('App\turma','turma_id')->with('salas');
    }
    
    function status() {
        return $this->belongsTo('App\status','status_id');
    }
    
}
