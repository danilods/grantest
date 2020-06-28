<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramaAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_assuntos', function (Blueprint $table) {
            $table->unsignedBigInteger('programa_id');

            $table->foreign('programa_id')->references('id')->on('programa_estudo')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('assunto_id');

            $table->foreign('assunto_id')->references('id')->on('assuntos')
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
        Schema::dropIfExists('programa_assuntos');
    }
}
