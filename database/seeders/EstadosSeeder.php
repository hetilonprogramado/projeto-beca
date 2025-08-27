<?php

namespace Database\Seeders;
use App\Models\Estados;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $estados = Estados::get();
        if($estados->count() == 0) {
			Estados::create(['id' => 12, 'nome' => 'Acre', 'uf' => 'AC','pais' => 1]);
			Estados::create(['id' => 27, 'nome' => 'Alagoas', 'uf' => 'AL','pais' => 1]);
			Estados::create(['id' => 16, 'nome' => 'Amapá', 'uf' => 'AP','pais' => 1]);
			Estados::create(['id' => 13, 'nome' => 'Amazonas', 'uf' => 'AM','pais' => 1]);
			Estados::create(['id' => 29, 'nome' => 'Bahia', 'uf' => 'BA','pais' => 1]);
			Estados::create(['id' => 23, 'nome' => 'Ceará', 'uf' => 'CE','pais' => 1]);
			Estados::create(['id' => 53, 'nome' => 'Distrito Federal', 'uf' => 'DF','pais' => 1]);
			Estados::create(['id' => 32, 'nome' => 'Espírito Santo', 'uf' => 'ES','pais' => 1]);
			Estados::create(['id' => 52, 'nome' => 'Goiás', 'uf' => 'GO','pais' => 1]);
			Estados::create(['id' => 21, 'nome' => 'Maranhão', 'uf' => 'MA','pais' => 1]);
			Estados::create(['id' => 51, 'nome' => 'Mato Grosso', 'uf' => 'MT','pais' => 1]);
			Estados::create(['id' => 50, 'nome' => 'Mato Grosso do Sul', 'uf' => 'MS','pais' => 1]);
			Estados::create(['id' => 31, 'nome' => 'Minas Gerais', 'uf' => 'MG','pais' => 1]);
			Estados::create(['id' => 15, 'nome' => 'Pará', 'uf' => 'PA','pais' => 1]);
			Estados::create(['id' => 25, 'nome' => 'Paraíba', 'uf' => 'PB','pais' => 1]);
			Estados::create(['id' => 41, 'nome' => 'Paraná', 'uf' => 'PR','pais' => 1]);
			Estados::create(['id' => 26, 'nome' => 'Pernambuco', 'uf' => 'PE','pais' => 1]);
			Estados::create(['id' => 22, 'nome' => 'Piauí', 'uf' => 'PI','pais' => 1]);
			Estados::create(['id' => 33, 'nome' => 'Rio de Janeiro', 'uf' => 'RJ','pais' => 1]);
			Estados::create(['id' => 24, 'nome' => 'Rio Grande do Norte', 'uf' => 'RN','pais' => 1]);
			Estados::create(['id' => 43, 'nome' => 'Rio Grande do Sul', 'uf' => 'RS','pais' => 1]);
			Estados::create(['id' => 11, 'nome' => 'Rondônia', 'uf' => 'RO','pais' => 1]);
			Estados::create(['id' => 14, 'nome' => 'Roraima', 'uf' => 'RR','pais' => 1]);
			Estados::create(['id' => 42, 'nome' => 'Santa Catarina', 'uf' => 'SC','pais' => 1]);
			Estados::create(['id' => 35, 'nome' => 'São Paulo', 'uf' => 'SP','pais' => 1]);
			Estados::create(['id' => 28, 'nome' => 'Sergipe', 'uf' => 'SE','pais' => 1]);
			Estados::create(['id' => 17, 'nome' => 'Tocantins', 'uf' => 'TO','pais' => 1]);
        }
    }
}
