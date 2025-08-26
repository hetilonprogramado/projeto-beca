<?php

namespace Database\Seeders;

use App\Models\Cidades;
use App\Models\Estados;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatuesSeeder::class);
        $this->call(EmpresasSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CidadesSeeder::class);
        $this->call(UserSeeder::class);
    }
}
