<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrimestresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimestres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle_fr');
            $table->string('libelle_en');
            $table->integer('annee_academique_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trimestres');
    }
}
