<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorLinksToUsers extends Migration {

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
            $table->integer('author_user_id')->nullable();
            $table->integer('author2_user_id')->nullable();

        });
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
            $table->dropColumn('author_user_id');
            $table->dropColumn('author2_user_id');			//
		});
	}

}
