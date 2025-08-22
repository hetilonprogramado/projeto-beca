<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
        'grupo_usuario_id',
        'codigo_acesso',
        'cpf',
        'rg',
        'sexo',
        'status_id',
        'user_system',
        'user_deleted_id',
        'user_id',
        'rua',
        'numero',
        'cep',
        'bairro',
        'cidade_id',
        'estado_id',
        'data_admissao',
        'data_demissao',
        'data_nascimento',
        'telefone1',
        'telefone2',
        'salario',
        'perc_compra',
        'cargo',
        'pis',
        'ctps',
        'token_app',
        'foto',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function status()
    {
        return $this->belongsTo('app\status', 'status_id');
    }

    function funcionario() {
        return $this->belongsTo('App\funcionario','funcionario_id');
    }

    function empresas() {
        return $this->belongsTo('App\empresa','empresa_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
