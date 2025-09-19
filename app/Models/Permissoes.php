<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissoes extends Model
{
    protected $table = 'permissoes';

    protected $fillable = [
        'grupos_user_id',
        'menu_id',
    ];
}
