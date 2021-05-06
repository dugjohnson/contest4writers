<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoreFieldsToFinalScoresheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('final_scoresheets', function (Blueprint $table) {
            $table->text('standout')->nullable();
            $table->text('improve')->nullable();
            $table->text('assessment')->nullable();
            $table->unsignedInteger('score')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->boolean('synopsis')->default(false);
            $table->boolean('full_manuscript')->default(false);
            $table->boolean('other')->default(false);
            $table->text('comments')->nullable();
            $table->text('signature')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('final_scoresheets', function (Blueprint $table) {
            $table->dropColumn(['standout', 'improve', 'assessment',
                'score', 'rank', 'synopsis', 'full_manuscript', 'other',
                'comments', 'signature']);
        });
    }
}
