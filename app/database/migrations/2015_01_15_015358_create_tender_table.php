<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tenders',function($table){
			$table->increments('id');
			$table->integer('contractor_id')->length(10)->unsigned();
			$table->integer('contact_id')->length(10)->unsigned();
			$table->integer('sales_id')->length(10)->unsigned();
			$table->integer('project_id')->length(10)->unsigned();
			//$table->integer('quotation_id')->length(10)->unsigned()->nullable();
			$table->decimal('amount',10,2)->nullable();
			$table->string('status')->default('101');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->timestamps();
			
			$table->foreign('contractor_id')->references('id')->on('contractors');
			$table->foreign('contact_id')->references('id')->on('contacts');
			$table->foreign('sales_id')->references('id')->on('users');
			$table->foreign('project_id')->references('id')->on('projects');
			//$table->foreign('quotation_id')->references('id')->on('quotations');
			$table->foreign('status')->references('code')->on('tender_status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tenders');
	}

}
