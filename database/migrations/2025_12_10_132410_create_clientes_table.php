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
            $table->string('nome',100);
            $table->string('endereco',100)->nullable();
            $table->date('data_nasc')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('email',50)->nullable();
            $table->string('telefone',20)->nullable();
            $table->enum('status', ['Ativo', 'Irregular', 'Inativo'])->nullable();
            $table->string('foto');
            $table->timestamps();
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
