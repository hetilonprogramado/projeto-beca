<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = Empresa::get();
        if($empresas->count() == 0) {
            Empresa::create(array(
                'rsocial' => 'EMPRESA MATRIZ - ALTERAR CADASTRO',
                'nome_fantasia' => 'MATRIZ',
                'cnpj' => '00.000.000/0001-00',
                'ie' => '00000',
                'status_id' => 1,
                'user_id' => 1,
                'rua' => 'Rua Modelo',
                'numero' => '0',
                'cep' => '00000-000',
                'bairro' => 'Bairro Modelo',
                'cidade_id' => 1,
                'telefone1' => '99-00000-0000',
                'email' => 'matriz@hotmail.com',
                'site' => 'www.matriz.com.br',
                'token' => '0000000000001',
            ));
        }
    }
}
