<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresencesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('justifier');
            $table->boolean('present');
            $table->integer('eleve_id')->unsigned();
            $table->integer('seance_cour_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('eleve_id')->references('id')->on('eleves');
            $table->foreign('seance_cour_id')->references('id')->on('seance_cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presences');
    }
}
