<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJudgesTableEmergencyJudge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judges', function (Blueprint $table) {
            $table->boolean('emergencyJudgeUnpub')->default(false);
            $table->boolean('emergencyJudgePub')->default(false);
         });
        if (Schema::hasColumn('judges', 'emergencyJudge')){
            Schema::table('judges', function (Blueprint $table) {
                $table->dropColumn('emergencyJudge');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('judges', 'emergencyJudgePub')){
            Schema::table('judges', function (Blueprint $table) {
                $table->dropColumn('emergencyJudgePub');
            });
        }
        if (Schema::hasColumn('judges', 'emergencyJudgePub')){
            Schema::table('judges', function (Blueprint $table) {
                $table->dropColumn('emergencyJudgePub');
            });
        }
    }
}
