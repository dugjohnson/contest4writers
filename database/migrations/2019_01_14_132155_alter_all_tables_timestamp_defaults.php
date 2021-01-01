<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAllTablesTimestampDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('entries', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('entry_user_links', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('judges', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('password_resets', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('scoresheets', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('created_at')->default(NULL)->nullable(true)->change();
            $table->timestamp('updated_at')->default(NULL)->nullable(true)->change();
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
