<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statues;

class StatuesSeeder extends Seeder
{
        /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabela = Statues::pluck('nome');
        foreach($tabela as $list){
            $tabelaList[] = $list;
        }
        if(count($tabela) == 0){
            $tabelaList[] = "";
        }

		$tabela_array[] = array(
			'id'   => 1,
			'nome' => 'Ativo',
		);

		$tabela_array[] = array(
			'id'   => 2,
			'nome' => 'Bloqueado',
		);

		$tabela_array[] = array(
			'id'   => 3,
			'nome' => 'Cancelado',
		);

		$tabela_array[] = array(
			'id'   => 4,
			'nome' => 'Trancado',
		);

		foreach($tabela_array as $list){
            if(!in_array($list['nome'], $tabelaList)){
                Statues::create($list);
            }
        }
    }
}
