<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnneeAcademiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee_academiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('encours');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('annee_academiques');
    }
}
