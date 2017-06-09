<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditChapitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('titres');
        Schema::dropIfExists('grand_titres');
        Schema::table('chapitres', function (Blueprint $table) {
            $table->dropColumn('nbr_heure');
            $table->dropColumn('nbr_heure_realiser');
            $table->dropColumn('terminer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
