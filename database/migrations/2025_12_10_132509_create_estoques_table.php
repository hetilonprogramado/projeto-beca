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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->nullable()->constrained('produtos')->cascadeOnDelete();
            $table->string('codigo_barra')->nullable();
            $table->enum('tipo_de_movimento', ['Entrada', 'Saida'])->nullable();
            $table->integer('quantidade');
            $table->string('origem')->nullable();
            $table->date('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
