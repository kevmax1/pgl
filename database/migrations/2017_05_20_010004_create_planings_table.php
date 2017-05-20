<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlaningsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matiere_programmer_id')->unsigned();
            $table->integer('jour_id')->unsigned();
            $table->integer('plage_horaire_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('matiere_programmer_id')->references('id')->on('matiere_programmers');
            $table->foreign('jour_id')->references('id')->on('jours');
            $table->foreign('plage_horaire_id')->references('id')->on('plage_horaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planings');
    }
}
