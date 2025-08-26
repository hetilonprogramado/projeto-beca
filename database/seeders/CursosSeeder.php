<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabela = Curso::pluck('nome');
        foreach($tabela as $list){
            $tabelaSinc[] = $list;
        }
        if(count($tabela) == 0){
            $tabelaSinc[] = "";
        }

		$tabelaSinc_array[] = array(
			'nome' => 'INFANTIL',
			'status_id' => 1,
			'user_id' => 1,
			'nivel_id' => 1,
            'tipo_lancamento' => 'Conceito',
            'extracurricular' => 'Nao',
            'hora_aula' => 200,
		);

        $tabelaSinc_array[] = array(
			'nome' => 'ANOS INICIAIS',
			'status_id' => 1,
			'user_id' => 1,
            'nivel_id' => 2,
            'tipo_lancamento' => 'Nota',
            'extracurricular' => 'Nao',
            'hora_aula' => 200
		);

		$tabelaSinc_array[] = array(
			'nome' => 'ANOS FINAIS',
			'status_id' => 1,
			'user_id' => 1,
            'nivel_id' => 3,
            'tipo_lancamento' => 'Nota',
            'extracurricular' => 'Nao',
            'hora_aula' => 200
		);

        foreach($tabelaSinc_array as $list){
            if(!in_array($list['nome'], $tabelaSinc)){
                Curso::create($list);
            }
        }
    }
}
