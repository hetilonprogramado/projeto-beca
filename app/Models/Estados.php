<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estados extends Model
{
    protected $table = 'estados';
    protected $fillable = ['nome', 'uf', 'pais'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
