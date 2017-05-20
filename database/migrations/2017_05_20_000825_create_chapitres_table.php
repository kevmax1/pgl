<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChapitresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odre');
            $table->string('libelle');
            $table->integer('nbr_heure');
            $table->integer('nbr_heure_realiser');
            $table->boolean('terminer');
            $table->integer('matiere_programmer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('chapitres');
    }
}
