<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
			$table->integer('empresa_id')->unsigned();
            $table->string('nome',100);
            $table->string('cpf',20)->nullable();
            $table->string('rg',20)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->integer('status_id')->unsigned();
            $table->enum('user_system', ['Sim', 'Nao']);
            $table->integer('user_deleted_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('senha_compra',20)->nullable();
            $table->string('rua',100)->nullable();
            $table->string('numero',20)->nullable();
            $table->string('cep',20)->nullable();
            $table->string('bairro',100)->nullable();
            $table->integer('cidade_id')->nullable();
            $table->integer('estado_id')->nullable();
            $table->datetime('data_admissao')->nullable();
            $table->datetime('data_demissao')->nullable();
            $table->string('telefone1',20)->nullable();
            $table->string('telefone2',20)->nullable();
            $table->decimal('salario')->nullable()->default(0);
            $table->string('cargo',100)->nullable();
            $table->string('pis',20)->nullable();
            $table->string('ctps',20)->nullable();
            $table->datetime('data_nascimento')->nullable();
            $table->string('nome_mae',100)->nullable();			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
