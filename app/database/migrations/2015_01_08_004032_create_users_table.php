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
		Schema::create('users',function($table){
			$table->increments('id');
			$table->integer('role_id')->length(10)->unsigned();
			$table->string('username');
			$table->string('password');
			$table->string('email')->unique();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('address_street')->nullable();
			$table->string('address_suburb')->nullable();
			$table->string('address_state')->nullable();
			$table->string('address_zip')->nullable();
			$table->string('phone')->nullable();
			$table->string('country')->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('role_id')->references('id')->on('roles');
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
