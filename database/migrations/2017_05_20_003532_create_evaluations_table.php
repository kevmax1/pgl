<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('sequence_id')->unsigned();
            $table->integer('matiere_programmer_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sequence_id')->references('id')->on('sequences');
            $table->foreign('matiere_programmer_id')->references('id')->on('matiere_programmers');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
