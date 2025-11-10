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
        Schema::create('turmas_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->integer('user_id');
            $table->integer('user_deleted_id')->nullable()->unsigned();
            $table->enum('sinc', ['Sim', 'Nao'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_turmas_disciplinas');
    }
};
