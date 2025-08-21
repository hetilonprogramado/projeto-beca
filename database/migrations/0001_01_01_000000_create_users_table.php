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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('name',100);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('empresa_id')->unsigned();
            $table->integer('grupo_usuario_id')->nullable();
            $table->rememberToken();
            $table->string('codigo_acesso',20)->nullable();
            $table->string('cpf',20)->nullable();
            $table->string('rg',20)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino'])->nullable();
            $table->integer('status_id')->unsigned();
            $table->enum('user_system', ['Sim', 'Nao']);
            $table->integer('user_deleted_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('rua',100)->nullable();
            $table->string('numero',20)->nullable();
            $table->string('cep',20)->nullable();
            $table->string('bairro',100)->nullable();
            $table->integer('cidade_id')->nullable();
            $table->integer('estado_id')->nullable();
            $table->datetime('data_admissao')->nullable();
            $table->datetime('data_demissao')->nullable();
            $table->string('telefone1',20)->nullable();
            $table->string('telefone2',20)->nullable();
            $table->decimal('salario')->nullable()->default(0);
            $table->decimal('perc_compra')->nullable()->default(0);
            $table->string('cargo',100)->nullable();
            $table->string('pis',20)->nullable();
            $table->string('ctps',20)->nullable();
            $table->string('token_app',100)->nullable();
            $table->datetime('data_nascimento')->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('status_id')->references('id')->on('statuses');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
