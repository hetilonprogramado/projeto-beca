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
            $table->string('rsocial_nome');
            $table->string('nfantasia_apelido')->nullable();
            $table->integer('status_id')->unsigned();;
            $table->integer('user_id');
            $table->string('rua',100)->nullable();
            $table->string('numero',20)->nullable();
            $table->string('cep',20)->nullable();
            $table->string('bairro',100)->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('cidade_id')->nullable();
            $table->date('data_abert_nasc')->nullable();
            $table->enum('tipo_pessoa', ['Juridica', 'Fisica'])->nullable()->default('Fisica');
            $table->string('cnpj_cpf',20)->nullable();
            $table->string('ie_rg',20)->nullable();
            $table->string('email',50)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->enum('fornecedor', ['Nao', 'Sim'])->nullable()->default('Nao');
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
