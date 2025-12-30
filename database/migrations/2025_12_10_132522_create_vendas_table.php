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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('cliente',100);
            $table->string('descricao_produtos',100);
            $table->double('total');
            $table->integer('parcelas');
            $table->enum('tipo_de_pagamento', ['Avista', 'Aprazo'])->nullable();
            $table->enum('forma_de_pagamento', ['Pix', 'Dinheiro', 'Credito', 'Debito', 'Boleto'])->nullable();
            $table->double('juros')->nullable();
            $table->double('desconto')->nullable();
            $table->double('valor_pago',100);
            $table->double('troco',100);
            $table->enum('retirada', ['Local', 'Delivery']);
            $table->string('usuario');
            $table->datetime('data_hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
