<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSheFieldsToJudges extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('judges', function(Blueprint $table)
		{
			//
			$table->boolean('erotic')->default(true);
			$table->boolean('glbt')->default(true);
			$table->boolean('bsdm')->default(true);
			$table->boolean('vampires')->default(true);
			$table->boolean('religious')->default(true);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('judges', function(Blueprint $table)
		{
			$table->dropColumn('erotic');
			$table->dropColumn('glbt');
			$table->dropColumn('bsdm');
			$table->dropColumn('vampires');
			$table->dropColumn('religious');
			//

		});
	}

}
