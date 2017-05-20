<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscriptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_inscription');
            $table->integer('annee_academique_id')->unsigned();
            $table->integer('niveau_id')->unsigned();
            $table->integer('eleve_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('niveau_id')->references('id')->on('nivaus');
            $table->foreign('eleve_id')->references('id')->on('eleves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscriptions');
    }
}
