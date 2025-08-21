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
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
			$table->softDeletes();
			$table->integer('empresa_id')->unsigned();
            $table->string('nome');
            $table->integer('curso_id');
            $table->integer('tipo_conta_id');
            $table->integer('sala_id')->nullable();
            $table->decimal('valor')->nullable()->default(0);
            $table->date('data_inicial')->nullable();
            $table->date('data_final')->nullable();
            $table->date('data_encerrar_lancamento')->nullable();
            $table->integer('status_id')->unsigned();
			$table->string('carga_hr')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
			$table->enum('exibir_data_final',['Sim','Nao'])->nullable()->default('Sim');
			$table->enum('validar_acesso',['Nao','Sim'])->default('Nao');
			$table->enum('recorrente',['Nao','Sim'])->default('Nao');
			$table->string('updated_x')->nullable();
            $table->timestamps();
            
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
