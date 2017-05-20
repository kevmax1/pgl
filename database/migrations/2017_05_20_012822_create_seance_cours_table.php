<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeanceCoursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_seance');
            $table->integer('planing_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('planing_id')->references('id')->on('planings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seance_cours');
    }
}
