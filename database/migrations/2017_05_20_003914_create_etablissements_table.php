<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtablissementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('devise');
            $table->string('adresse');
            $table->string('logo');
            $table->integer('ville_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ville_id')->references('id')->on('villes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etablissements');
    }
}
