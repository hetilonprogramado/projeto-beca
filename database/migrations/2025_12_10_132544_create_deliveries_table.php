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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('nome_do_cliente',100);
            $table->string('nome_do_produtos',100);
            $table->string('nome_do_carrinho',100);
            $table->enum('tipo_de_pagamento', ['Avista', 'Aprazo'])->nullable();
            $table->enum('forma_de_pagamento', ['Pix', 'Dinheiro', 'Credito', 'Debito', 'Boleto'])->nullable();
            $table->enum('juros', ['Reais', 'Porcentagem'])->nullable();
            $table->enum('desconto', ['Reais', 'Porcentagem'])->nullable();
            $table->string('valor_pago',100);
            $table->string('troco',100);
            $table->string('total_carrinho');
            $table->string('nome_vendedor',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
