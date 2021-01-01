<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorEntryUserLink extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entry_user_links', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('entry_id');
            $table->text('connection_type');
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
		Schema::drop('entry_user_links');
	}

}
