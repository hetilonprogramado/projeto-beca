<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statues;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoDisciplina extends Model
{
    /**
     * Nome da tabela
     *
     * @var string
     */
    protected $table = 'grupos_disciplinas';

    /**
     * Chave primária
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Campos que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'status_id',
        'user_id',
        'user_deleted_id',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relacionamento com Status
     */
    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}
