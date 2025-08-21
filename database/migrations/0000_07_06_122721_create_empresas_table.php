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
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('rsocial',100);
            $table->string('nome_fantasia',100);
            $table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('regime_apuracao')->nullable();
            $table->string('cnpj',20);
            $table->string('ie',20)->nullable();
            $table->string('rua',100)->nullable();
            $table->string('numero',20)->nullable();
            $table->string('cep',20)->nullable();
            $table->string('bairro',100)->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('cidade_id')->nullable();
            $table->string('telefone1',20)->nullable();
            $table->string('telefone2',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('site',100)->nullable();
            $table->string('logo')->nullable();
            $table->string('token')->nullable();
            $table->date('data_lib')->nullable();
			$table->enum('tipo_pessoa', ['Juridica', 'Fisica'])->nullable();
            $table->timestamps();
            
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
