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
    protected $fillable = ['id','empresa_id','status_id','cliente_id','responsavel_id','curso_id','turma_id','sala_id','valor','desconto','data_cad','ordem','obs_carteira','aluno_curso','instituicao_anterior','user_id','ano_letivo','user_deleted_id','deleted_at'];
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
     // Um aluno pertence a um cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id')
                    ->whereNull('clientes.deleted_at');
    }

    // Uma matrícula pertence a um curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }

    // Uma matrícula pertence a uma sala
    public function sala()
    {
        return $this->belongsTo(Salas::class, 'sala_id', 'id');
    }

    // Uma matrícula pertence a uma turma (e turma tem sala)
    public function turma()
    {
        return $this->belongsTo(Turmas::class, 'turma_id', 'id')
                    ->with('sala');
    }

    // Status da matrícula
    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id', 'id');
    }
}
