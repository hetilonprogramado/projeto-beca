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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
			$table->softDeletes();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->integer('nivel_id')->unsigned();
            $table->enum('tipo_lancamento',['Nota','Conceito'])->nullable()->default('Nota');
            $table->enum('extracurricular',['Sim','Nao'])->nullable()->default('Nao');
            $table->integer('hora_aula')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
