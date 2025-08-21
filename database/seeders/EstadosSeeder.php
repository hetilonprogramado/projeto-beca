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
			Estados::create(['id' => 16, 'nome' => utf8_encode('Amap�'), 'uf' => 'AP','pais' => 1]);
			Estados::create(['id' => 13, 'nome' => 'Amazonas', 'uf' => 'AM','pais' => 1]);
			Estados::create(['id' => 29, 'nome' => 'Bahia', 'uf' => 'BA','pais' => 1]);
			Estados::create(['id' => 23, 'nome' => utf8_encode('Cear�'), 'uf' => 'CE','pais' => 1]);
			Estados::create(['id' => 53, 'nome' => 'Distrito Federal', 'uf' => 'DF','pais' => 1]);
			Estados::create(['id' => 32, 'nome' => utf8_encode('Esp�rito Santo'), 'uf' => 'ES','pais' => 1]);
			Estados::create(['id' => 52, 'nome' => utf8_encode('Goi�s'), 'uf' => 'GO','pais' => 1]);
			Estados::create(['id' => 21, 'nome' => utf8_encode('Maranh�o'), 'uf' => 'MA','pais' => 1]);
			Estados::create(['id' => 51, 'nome' => 'Mato Grosso', 'uf' => 'MT','pais' => 1]);
			Estados::create(['id' => 50, 'nome' => 'Mato Grosso do Sul', 'uf' => 'MS','pais' => 1]);
			Estados::create(['id' => 31, 'nome' => 'Minas Gerais', 'uf' => 'MG','pais' => 1]);
			Estados::create(['id' => 15, 'nome' => utf8_encode('Par�'), 'uf' => 'PA','pais' => 1]);
			Estados::create(['id' => 25, 'nome' => utf8_encode('Para�ba'), 'uf' => 'PB','pais' => 1]);
			Estados::create(['id' => 41, 'nome' => utf8_encode('Paran�'), 'uf' => 'PR','pais' => 1]);
			Estados::create(['id' => 26, 'nome' => 'Pernambuco', 'uf' => 'PE','pais' => 1]);
			Estados::create(['id' => 22, 'nome' => utf8_encode('Piau�'), 'uf' => 'PI','pais' => 1]);
			Estados::create(['id' => 33, 'nome' => 'Rio de Janeiro', 'uf' => 'RJ','pais' => 1]);
			Estados::create(['id' => 24, 'nome' => 'Rio Grande do Norte', 'uf' => 'RN','pais' => 1]);
			Estados::create(['id' => 43, 'nome' => 'Rio Grande do Sul', 'uf' => 'RS','pais' => 1]);
			Estados::create(['id' => 11, 'nome' => utf8_encode('Rond�nia'), 'uf' => 'RO','pais' => 1]);
			Estados::create(['id' => 14, 'nome' => 'Roraima', 'uf' => 'RR','pais' => 1]);
			Estados::create(['id' => 42, 'nome' => 'Santa Catarina', 'uf' => 'SC','pais' => 1]);
			Estados::create(['id' => 35, 'nome' => utf8_encode('S�o Paulo'), 'uf' => 'SP','pais' => 1]);
			Estados::create(['id' => 28, 'nome' => 'Sergipe', 'uf' => 'SE','pais' => 1]);
			Estados::create(['id' => 17, 'nome' => 'Tocantins', 'uf' => 'TO','pais' => 1]);
        }
		
		$estados = Estados::where('pais',2)->get();
		if($estados->count() == 0) {
			Estados::create(['nome' => 'Cabinda', 'uf' => 'AOCDA01','pais' => 2]);
			Estados::create(['nome' => 'Zaire', 'uf' => 'AOZRE02','pais' => 2]);
			Estados::create(['nome' => utf8_encode('U�ge'), 'uf' => 'AOUGE03','pais' => 2]);
			Estados::create(['nome' => 'Bengo', 'uf' => 'AOBGO04','pais' => 2]);
			Estados::create(['nome' => 'Luanda', 'uf' => 'AOLDA05','pais' => 2]);
			Estados::create(['nome' => 'Cuanza Norte', 'uf' => 'AOCNO06','pais' => 2]);
			Estados::create(['nome' => 'Cuanza Sul', 'uf' => 'AOCSU07','pais' => 2]);
			Estados::create(['nome' => 'Malanje', 'uf' => 'AOMJE08','pais' => 2]);
			Estados::create(['nome' => 'Lunda Norte', 'uf' => 'AOLNO09','pais' => 2]);
			Estados::create(['nome' => 'Lunda Sul', 'uf' => 'AOLSU10','pais' => 2]);
			Estados::create(['nome' => 'Moxico', 'uf' => 'AOMCO11','pais' => 2]);
			Estados::create(['nome' => utf8_encode('Bi�'), 'uf' => 'AOBIE12','pais' => 2]);
			Estados::create(['nome' => 'Huambo', 'uf' => 'AOHBO13','pais' => 2]);
			Estados::create(['nome' => 'Benguela', 'uf' => 'AOBLA14','pais' => 2]);
			Estados::create(['nome' => 'Namibe', 'uf' => 'AONBE15','pais' => 2]);
			Estados::create(['nome' => utf8_encode('Hu�la'), 'uf' => 'AOHLA16','pais' => 2]);
			Estados::create(['nome' => 'Cunene', 'uf' => 'AOCNE17','pais' => 2]);
			Estados::create(['nome' => 'Cuando Cubango', 'uf' => 'AOCCU18','pais' => 2]);
		}
    }
}
