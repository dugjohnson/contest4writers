<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddElementsToEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->boolean('erotic')->default(true);
            $table->boolean('glbt')->default(true);
            $table->boolean('bdsm')->default(true);
            $table->boolean('childdeath')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            //
            $table->dropColumn('erotic');
            $table->dropColumn('glbt');
            $table->dropColumn('bdsm');
            $table->dropColumn('childdeath');
        });
    }
}
