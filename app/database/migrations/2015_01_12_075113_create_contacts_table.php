<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts',function($table){
			$table->increments('id');
			$table->integer('contractor_id')->length(10)->unsigned()->nullable();
			$table->string('name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->enum('grade',array('A','B','C'));
			$table->string('address_street')->nullable();
			$table->string('address_suburb')->nullable();
			$table->string('address_state')->nullable();
			$table->string('address_zip')->nullable();
			$table->timestamps();
			$table->foreign('contractor_id')->references('id')->on('contractors')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
