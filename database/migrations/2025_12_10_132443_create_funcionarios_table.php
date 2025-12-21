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
            $table->increments('id');
            $table->softDeletes();
            $table->string('nome',100);
            $table->string('cpf/cnpj')->nullable();
            $table->string('senha')->nullable();
            $table->string('endereco',20)->nullable();
            $table->string('telefone');
            $table->decimal('salario')->nullable()->default(0);
            $table->string('cargo',100)->nullable();
            $table->string('email');
            $table->string('nivel_acesso',20)->nullable()->default('funcionario');
            $table->string('foto');
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
