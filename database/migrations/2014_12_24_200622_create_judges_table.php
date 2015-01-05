<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('judges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->smallInteger('firstYear')->nullable();
			$table->boolean('judgePub')->default(false);
			$table->boolean('judgeUnpub')->default(false);
			$table->boolean('judgeEitherNotBoth')->default(false);
			$table->tinyInteger('mainstream')->default(0);
			$table->tinyInteger('category')->default(0);
			$table->tinyInteger('historical')->default(0);
			$table->tinyInteger('singleTitle')->default(0);
			$table->tinyInteger('paranormal')->default(0);
			$table->tinyInteger('inspirational')->default(0);
			$table->tinyInteger('maxpubentries')->default(0);
			$table->tinyInteger('maxunpubentries')->default(0);
			$table->text('subcategorylike')->nullable();
			$table->text('subcategorydislike')->nullable();
			$table->longText('comments')->nullable();
			$table->text('internalComments')->nullable();
			$table->tinyInteger('yearsJudged')->default(0);
			$table->text('categoriesjudged')->nullable();
			$table->text('judgeThisYear')->nullable();
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
		Schema::drop('judges');
	}

}
