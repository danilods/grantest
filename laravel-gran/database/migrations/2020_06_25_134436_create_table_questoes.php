<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQuestoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->id();
            $table->string('cod_questao');

            $table->string('enunciado');
            $table->integer('modalidade');
            $table->year('ano');


            $table->unsignedBigInteger('assunto_id');

            $table->foreign('assunto_id')->references('id')->on('assuntos')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('banca_id');

            $table->foreign('banca_id')->references('id')->on('bancas')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('orgao_id');

            $table->foreign('orgao_id')->references('id')->on('orgaos')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questoes');
    }
}
