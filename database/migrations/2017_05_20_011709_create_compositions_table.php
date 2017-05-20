<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompositionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compositions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('note');
            $table->integer('evaluation_id')->unsigned();
            $table->integer('eleve_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
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
        Schema::drop('compositions');
    }
}
