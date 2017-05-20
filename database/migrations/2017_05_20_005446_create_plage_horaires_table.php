<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlageHorairesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plage_horaires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordre');
            $table->string('libelle');
            $table->boolean('pause');
            $table->integer('nbr_heure');
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
        Schema::drop('plage_horaires');
    }
}
