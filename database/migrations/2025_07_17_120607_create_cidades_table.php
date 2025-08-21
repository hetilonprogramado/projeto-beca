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
        Schema::create('cidades', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('ibge_code');
            $table->unsignedBigInteger('estado_id')->unsigned();
			$table->timestamps();
        });
        
        Schema::table('cidades', function ($table) {
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidades');
    }
};
