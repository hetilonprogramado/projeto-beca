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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
			$table->integer('empresa_id')->unsigned();
            $table->integer('tipo_conta_id')->unsigned();
			$table->string('nome');
            $table->integer('user_id')->unsigned();
			$table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
			$table->string('updated_x')->nullable();
            $table->timestamps();
			
			$table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
