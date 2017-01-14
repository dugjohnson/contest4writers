<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateScoresheetsAddSheet extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('scoresheets', function(Blueprint $table)
		{
            $table->dropColumn('assignment_id');
            $table->integer('entry_id');
            $table->boolean('published');
            $table->text('category');
            $table->text('title');
            $table->integer('judge_id')->nullable();
            $table->text('scoresheetData')->nullable();
            $table->smallInteger('finalScore')->default(0);
            $table->text('commentsFile')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('ready')->default(false);
            $table->dateTime('sentToCoordinator')->nullable();
            $table->dateTime('sentToJudge')->nullable();
            $table->dateTime('scoreReceived')->nullable();
            $table->dateTime('followup')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('scoresheets', function(Blueprint $table)
		{
			//
            $table->integer('assignment_id');
            $table->dropColumn('entry_id');
            $table->dropColumn('published');
            $table->dropColumn('category');
            $table->dropColumn('title');
            $table->dropColumn('judge_id');
            $table->dropColumn('scoresheetData');
            $table->dropColumn('finalScore');
            $table->dropColumn('commentsFile');
            $table->dropColumn('completed');
            $table->dropColumn('ready');
            $table->dropColumn('sentToCoordinator');
            $table->dropColumn('sentToJudge');
            $table->dropColumn('scoreReceived');
            $table->dropColumn('followup');
		});
	}

}
