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
            $table->dropColumn('author2');
            $table->integer('author_user_id')->nullable();;
            $table->text('author2_user_id')->nullable();;
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
            $table->integer('author2')->nullable();;
            $table->integer('author_user_id');
            $table->text('author2_user_id');			//
		});
	}

}
