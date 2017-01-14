<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDropFieldsEntry extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::table('entries', function($table)
		{
			$table->dropColumn('returnScoresheet');
			$table->dropColumn('paymentType');
			$table->dropColumn('signed');
			$table->text('invoiceNumber');
			$table->boolean('enteredByPublisher')->default(false);
			$table->boolean('readRules')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\Schema::table('entries', function($table)
		{
			$table->boolean('returnScoresheet')->default(true);
			$table->tinyInteger('paymentType')->default(0);
			$table->text('signed');
			$table->dropColumn('invoiceNumber');
			$table->dropColumn('enteredByPublisher');
			$table->dropColumn('readRules');
		});
	}

}
