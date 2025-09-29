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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('codigo_barras',100);
            $table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->decimal('estoque_minimo')->nullable()->default(0);
            $table->integer('grupo_fiscal_id')->unsigned();
            $table->integer('grupo_produto_id')->unsigned();
            $table->enum('utilizacao', ['Venda', 'Consumo'])->nullable();
            $table->decimal('vlr_compra')->nullable()->default(0);
            $table->decimal('vlr_venda')->nullable()->default(0);
            $table->string('ncm',100);
            $table->enum('combo', ['Nao', 'Sim'])->nullable();
            $table->string('imagem',100);
            $table->integer('grup_prod_id')->unsigned();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
