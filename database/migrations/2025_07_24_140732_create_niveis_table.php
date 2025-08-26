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
        Schema::create('niveis', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('nome');
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('user_deleted_id')->unsigned()->nullable();
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
        Schema::dropIfExists('niveis');
    }
};
