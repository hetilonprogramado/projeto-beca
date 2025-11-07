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
                'id' => 1,
                'nome' => 'Alunos',
                'rota' => 'cliente',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-users w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 2,
                'nome' => 'Funcionários',
                'rota' => 'funcionario',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-users w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 3,
                'nome' => 'Matrículas',
                'rota' => 'matricula',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-file-signature w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 4,
                'nome' => 'Cursos',
                'rota' => 'curso',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-book w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 5,
                'nome' => 'Turmas',
                'rota' => 'turma',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-chalkboard-teacher w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 6,
                'nome' => 'Salas',
                'rota' => 'sala',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-chalkboard-teacher w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 12,
                'nome' => 'Disciplinas',
                'rota' => 'disciplina',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-file-signature w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 13,
                'nome' => 'Grupos da Disciplina',
                'rota' => 'grupo-disciplina',
                'status_id' => 1,
                'tipo' => 1,
                'icone' => 'fas fa-file-signature w-5',
				'user_id' => 1,
            );
            //Configurações
            $menus_array[] = array(
                'id' => 7,
                'nome' => 'Empresa',
                'rota' => 'empresa',
                'status_id' => 1,
                'tipo' => 2,
                'icone' => 'fas fa-school w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 8,
                'nome' => 'Grupos de Usuário',
                'rota' => 'grupo-usuario',
                'status_id' => 1,
                'tipo' => 2,
                'icone' => 'fas fa-user-cog w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 9,
                'nome' => 'Usuários',
                'rota' => 'usuario',
                'status_id' => 1,
                'tipo' => 2,
                'icone' => 'fas fa-user-cog w-5',
				'user_id' => 1,
            );
            //Estoque
            $menus_array[] = array(
                'id' => 10,
                'nome' => 'Produtos',
                'rota' => 'produto',
                'status_id' => 1,
                'tipo' => 3,
                'icone' => 'fas fa-box w-5',
				'user_id' => 1,
            );

            $menus_array[] = array(
                'id' => 11,
                'nome' => 'Grupos de Produtos',
                'rota' => 'grupo-produto',
                'status_id' => 1,
                'tipo' => 3,
                'icone' => 'fas fa-box w-5',
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
