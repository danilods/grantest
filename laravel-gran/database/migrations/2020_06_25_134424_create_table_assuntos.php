<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAssuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assuntos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_assunto')->unique();
            $table->unsignedBigInteger('raiz_id')->nullable();

            $table->foreign('raiz_id')->references('id')->on('assuntos')

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
        Schema::dropIfExists('assuntos');
    }
}
