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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->integer('empresa_id')->unsigned();
            $table->string('nome');
            $table->string('apelido')->nullable();
            $table->string('registro_nascimento',20)->nullable();
            $table->string('nacionalidade',50)->nullable();
            $table->string('naturalidade',100)->nullable();
            $table->string('religiao',100)->nullable();
            $table->integer('status_id')->unsigned();;
            $table->integer('user_id');
            $table->string('rua',100)->nullable();
            $table->string('numero',20)->nullable();
            $table->string('cep',20)->nullable();
            $table->string('bairro',100)->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('cidade_id')->nullable();
            $table->date('data_nasc')->nullable();
            $table->string('cpf',20)->nullable();
            $table->string('rg',20)->nullable();
            $table->string('email',50)->nullable();
            $table->string('celular',20)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->integer('user_deleted_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses');
			$table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
