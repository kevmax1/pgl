<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrandTitresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grand_titres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->string('libelle');
            $table->boolean('terminer');
            $table->integer('chapitre_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('chapitre_id')->references('id')->on('chapitres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grand_titres');
    }
}
