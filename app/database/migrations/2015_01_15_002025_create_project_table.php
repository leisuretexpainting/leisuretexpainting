<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects',function($table){
			$table->increments('id');
			$table->string('type');
			$table->string('name')->unique();
			$table->string('address_street')->nullable();
			$table->string('address_suburb')->nullable();
			$table->string('address_state')->nullable();
			$table->string('address_zip')->nullable();
			$table->date('due_date');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('type')->references('id')->on('project_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
