<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullablesToEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->text('filename')->nullable()->change();
            $table->text('publisher')->nullable()->change();
            $table->text('editor')->nullable()->change();
            $table->text('publicationMonth')->nullable()->change();
            $table->text('author2Email')->nullable()->change();
            $table->text('author2')->nullable()->change();

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
        });
    }
}
