<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNivausTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivaus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle_fr');
            $table->string('libelle_en');
            $table->integer('cycle_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cycle_id')->references('id')->on('cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nivaus');
    }
}
