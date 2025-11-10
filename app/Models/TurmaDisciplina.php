<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurmaDisciplina extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'turmas_disciplinas';

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
    protected $fillable = ['id', 'empresa_id', 'turma_id', 'disciplina_id', 'funcionario_id', 'user_id', 'user_deleted_id', 'sinc','created_at','updated_at',];

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
    }

    public function turma()
    {
        return $this->belongsTo('App\Models\Turmas', 'turma_id');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Models\Disciplinas', 'disciplina_id');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario', 'funcionario_id');
    }
}
