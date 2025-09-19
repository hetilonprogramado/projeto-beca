<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = Menu::pluck('id');
        foreach($menus as $list){
            $menuses[] = $list;
        }
        if(count($menus) == 0){
            $menuses[] = "";
        }
            //Cadastros
            $menus_array[] = array(
                'nome' => 'Alunos',
                'rota' => 'cliente',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-users w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'nome' => 'Matrículas',
                'rota' => 'matricula',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-file-signature w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'nome' => 'Cursos',
                'rota' => 'curso',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-book w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'nome' => 'Turmas',
                'rota' => 'turma',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-chalkboard-teacher w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'nome' => 'Turmas',
                'rota' => 'turma',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-chalkboard-teacher w-5',
				'user_id' => 1,
            );
            //Configurações
            $menus_array[] = array(
                'nome' => 'Empresa',
                'rota' => 'empresa',
                'status_id' => 1,
                'tipo' => 2,
                'icone' => 'fas fa-school w-5',
				'user_id' => 1,
            );

        $i_menu = 1;
        foreach($menus_array as $list){
            if(!in_array($i_menu, $menuses)){
                Menu::create($list);
            }else{
                $m = Menu::findOrFail($i_menu);
                $m->update($list);
            }
            $i_menu++;
        }
    }
}
