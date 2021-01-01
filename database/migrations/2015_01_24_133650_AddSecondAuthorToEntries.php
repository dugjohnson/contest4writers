<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSecondAuthorToEntries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function(Blueprint $table)
		{
			//
			$table->text('authorEmail');
			$table->text('author2');
			$table->text('author2Email');
			
		});
		\Illuminate\Support\Facades\DB::statement('update entries,users set entries.authorEmail = users.email where entries.user_id = users.id');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entries', function(Blueprint $table)
		{
			$table->dropColumn('authorEmail');
			$table->dropColumn('author2');
			$table->dropColumn('author2Email');
			//
		});
	}

}
