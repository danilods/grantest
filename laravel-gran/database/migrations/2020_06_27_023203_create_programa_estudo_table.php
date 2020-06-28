<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramaEstudoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_estudo', function (Blueprint $table) {
            $table->id();
            $table->string('nome_programa')->nullable();
            $table->string('foco_programa')->nullable();
            $table->integer('meta_diaria')->nullable();

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
        Schema::dropIfExists('programa_estudo');
    }
}
