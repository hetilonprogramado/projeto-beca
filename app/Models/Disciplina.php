<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statues;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    /**
     * Nome da tabela no banco
     *
     * @var string
     */
    protected $table = 'disciplinas';

    /**
     * Chave primária
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Campos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'user_id',
        'user_deleted_id',
        'nome',
        'status_id',
        'hrs_aula',
        'sigla',
        'grupo_disciplina_id',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relacionamentos
     */
    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function grupoDisciplina()
    {
        return $this->belongsTo(GrupoDisciplina::class, 'grupo_disciplina_id');
    }
}
