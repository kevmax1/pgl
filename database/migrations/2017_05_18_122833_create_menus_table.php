<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatemenusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('libelle_en');
            $table->string('icon');
            $table->integer('parent_id');
            $table->string('route');
            $table->string('route_name');
            $table->integer('module_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
