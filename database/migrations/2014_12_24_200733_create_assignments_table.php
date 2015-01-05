<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('entry_id');
			$table->integer('judge_id')->nullable();
			$table->integer('scoresheet_id')->nullable();
			$table->boolean('published');
			$table->text('category');
			$table->boolean('ready');
			$table->dateTime('sentToCoordinator')->nullable();
			$table->dateTime('sentToJudge')->nullable();
			$table->dateTime('scoreReceived')->nullable();
			$table->smallInteger('score')->default(0);
			$table->dateTime('followup')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignments');
	}

}
