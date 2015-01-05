<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('firstName');
			$table->string('lastName');
			$table->string('writingName')->nullable();
			$table->string('phone1')->nullable();
			$table->string('phone2')->nullable();
			$table->string('phone3')->nullable();
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('zipCode')->nullable();
			$table->string('country')->nullable();
			$table->string('email2')->nullable();
			$table->rememberToken();			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
