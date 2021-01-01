<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->boolean('published');
			$table->boolean('returnScoresheet')->default(true);
			$table->boolean('finalist')->default(false);
			$table->boolean('received')->default(false);
			$table->text('author');
			$table->text('title');
			$table->text('category');
			$table->text('signed');
			$table->dateTime('dateOfEntry');
			$table->text('filename');
			$table->text('publisher');
			$table->text('editor');
			$table->text('publicationMonth');
			$table->tinyInteger('paymentType')->default(0);

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
		Schema::drop('entries');
	}

}
