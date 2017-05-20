<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatiereProgrammersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_programmers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coef');
            $table->integer('annee_academique_id')->unsigned();
            $table->integer('programme_id')->unsigned();
            $table->integer('groupe_matiere_id')->unsigned();
            $table->integer('matiere_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('programme_id')->references('id')->on('programmes');
            $table->foreign('groupe_matiere_id')->references('id')->on('groupe_matieres');
            $table->foreign('matiere_id')->references('id')->on('matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matiere_programmers');
    }
}
