<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JudgesChangeCategoryFieldnames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judges', function (Blueprint $table) {
            $table->renameColumn('inspirational','novella');
            $table->renameColumn('singleTitle','longTitle');
            $table->renameColumn('category','shortTitle');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('judges', function (Blueprint $table) {
            $table->renameColumn('novella', 'inspirational');
            $table->renameColumn('longTitle','singleTitle');
            $table->renameColumn('shortTitle','category');        });
    }
}
