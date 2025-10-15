<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GrupoUsuarios;

class GruposUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grupos = GrupoUsuarios::get();
        if($grupos->count() == 0) {
            GrupoUsuarios::create(array(
                'id' => 1,
				'nome' => 'ADM SISTEMA',
                'status_id' => 1,
                'user_id' => 1,
            ));
        }
    }
}
