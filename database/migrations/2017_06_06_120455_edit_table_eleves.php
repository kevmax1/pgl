<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableEleves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleves', function (Blueprint $table) {
            $table->unsignedInteger('sexe_id')->nullbale();
            $table->foreign('sexe_id')->references('id')->on('sexes');
            $table->dropColumn('sexe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleves', function (Blueprint $table) {
            //
        });
    }
}
