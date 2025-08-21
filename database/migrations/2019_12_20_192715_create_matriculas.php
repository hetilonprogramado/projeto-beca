<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function(Blueprint $table) {
            $table->integer('id');
            $table->softDeletes();
			$table->integer('empresa_id')->unsigned();
            $table->integer('status_id')->unsigned();
			$table->integer('cliente_id')->unsigned();
			$table->integer('curso_id')->unsigned();
			$table->integer('turma_id')->unsigned();
			$table->integer('sala_id')->unsigned()->nullable();
			$table->decimal('valor')->nullable()->default(0);
			$table->decimal('desconto')->nullable()->default(0);
			$table->date('data_cad')->nullable();
            $table->integer('ordem')->nullable();
            $table->string('obs_carteira')->nullable();
			$table->enum('aluno_curso',['Sim','Nao','Ex aluno'])->nullable()->default('Nao');
            $table->string('instituicao_anterior')->nullable();
            $table->integer('user_id')->unsigned();            
            $table->integer('user_deleted_id')->nullable();                        
            $table->enum('sinc',['Sim','Nao'])->nullable()->default('Nao');
			$table->string('updated_x')->nullable();
            $table->timestamps();
			
			$table->primary(['id']);
            
            $table->foreign('status_id')->references('id')->on('statuses');            
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matriculas');
    }
}
