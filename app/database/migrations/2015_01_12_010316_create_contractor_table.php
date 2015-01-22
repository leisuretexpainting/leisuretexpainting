<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractors',function($table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('business_address_street')->nullable();
			$table->string('business_address_suburb')->nullable();
			$table->string('business_address_state')->nullable();
			$table->string('business_address_zip')->nullable();
			$table->string('postal_address_street')->nullable();
			$table->string('postal_address_suburb')->nullable();
			$table->string('postal_address_state')->nullable();
			$table->string('postal_address_zip')->nullable();
			$table->string('abn')->nullable();
			$table->integer('is_active')->default(1);
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
		Schema::drop('contractors');
	}

}
