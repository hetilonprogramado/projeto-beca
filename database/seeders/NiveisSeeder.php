<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Niveis;

class NiveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabela = Niveis::pluck('nome');
        foreach($tabela as $list){
            $tabelaSinc[] = $list;
        }
        if(count($tabela) == 0){
            $tabelaSinc[] = "";
        }

		$tabelaSinc_array[] = array(
			'nome' => 'Infantil',
			'status_id' => 1,
			'user_id' => 1,
		);

        $tabelaSinc_array[] = array(
			'nome' => 'Fundamental',
			'status_id' => 1,
			'user_id' => 1,
		);

		$tabelaSinc_array[] = array(
			'nome' => 'Médio',
			'status_id' => 1,
			'user_id' => 1,
		);

		$tabelaSinc_array[] = array(
			'nome' => 'Superior',
			'status_id' => 1,
			'user_id' => 1,
		);

        foreach($tabelaSinc_array as $list){
            if(!in_array($list['nome'], $tabelaSinc)){
                Niveis::create($list);
            }
        }
    }
}
