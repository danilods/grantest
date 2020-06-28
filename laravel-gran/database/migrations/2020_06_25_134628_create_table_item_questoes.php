<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItemQuestoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_questoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao_item');

            $table->boolean('correcao_item');

            $table->unsignedBigInteger('questao_id');

            $table->foreign('questao_id')->references('id')->on('questoes')
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
        Schema::dropIfExists('item_questoes');
    }
}
