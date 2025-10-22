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
        Schema::create('grupos_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->nullable();
            $table->integer('lucro')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->decimal('comissao')->nullable()->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('grupos_produtos');
    }
};
