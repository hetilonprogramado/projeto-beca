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
        Schema::create('tipo_contas', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
			$table->integer('empresa_id')->unsigned();
            $table->string('nome',100);
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
			$table->string('updated_x')->nullable();
            $table->enum('tipo', ['E', 'S', 'I'])->nullable()->default('I');
            $table->timestamps();

			$table->foreign('status_id')->references('id')->on('statuses');
			$table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_contas');
    }
};
