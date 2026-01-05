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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('nome',100);
            $table->string('phone', 20)->nullable();
            $table->string('cargo',100)->nullable();
            $table->string('email');
            $table->double('salario')->nullable();
            $table->date('admissao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
