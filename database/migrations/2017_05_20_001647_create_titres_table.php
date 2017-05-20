<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->string('libelle');
            $table->integer('grand_titre_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('grand_titre_id')->references('id')->on('grand_titres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('titres');
    }
}
