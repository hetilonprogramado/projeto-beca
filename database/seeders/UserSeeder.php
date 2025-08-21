<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::get();
        if($usuarios->count() == 0) {
            User::create(array(
                'id' => 1,
                'empresa_id' => 1,
				'name' => 'Perfil TI',
                'email' => 'perfil@perfilti.com',
                'password' => Hash::make('p3rf1lt1'),
                'status_id' => 1,
                'grupo_usuario_id' => 1,
                'user_id' => 1,
                'codigo_acesso' => '0001',
                'user_system' => 'Sim',
            ));
        }
    }
}
