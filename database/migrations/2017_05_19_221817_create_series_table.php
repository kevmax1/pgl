<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('libelle_fr');
            $table->string('libelle_en');
            $table->integer('niveau_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('niveau_id')->references('id')->on('nivaus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('series');
    }
}
