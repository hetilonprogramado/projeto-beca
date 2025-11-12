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
        Schema::create('turma_professor', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('turma_id')->constrained('turmas')->onDelete('cascade');
            $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turma_professor');
    }
};
