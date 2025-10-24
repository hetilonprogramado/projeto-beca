<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Statues;

class GrupoDisciplina extends Model
{
    use HasFactory, SoftDeletes;

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

    /**
     * Campos de data (para soft delete)
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relacionamento com Statues
     */
    public function status()
    {
        return $this->belongsTo(Statues::class, 'status_id');
    }
}
