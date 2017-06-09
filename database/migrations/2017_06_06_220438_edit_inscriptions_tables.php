<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditInscriptionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->boolean('payer')->default(false);
            $table->integer('numero_recu')->nullable();
            $table->integer('classe_id')->unsigned()->nullable();
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            //
        });
    }
}
