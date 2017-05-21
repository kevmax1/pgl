<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAffectationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('vacation');
            $table->boolean('principal');
            $table->integer('annee_academique_id')->unsigned();
            $table->integer('enseignant_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->integer('matiere_programmer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('matiere_programmer_id')->references('id')->on('matiere_programmers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affectations');
    }
}
