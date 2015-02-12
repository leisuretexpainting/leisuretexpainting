<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotations', function($table){
			$table->increments('id');
			$table->integer('tender_id')->length(10)->unsigned();
			$table->integer('quotation_by')->length(10)->unsigned();
			$table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');
			$table->foreign('quotation_by')->references('id')->on('users')->onDelete('no action');
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
		Schema::drop('quotations');
	}

}
