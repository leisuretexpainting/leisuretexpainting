<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenderDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tender_documents',function($table){
			$table->integer('tender_id')->length(10)->unsigned();
			$table->string('name');
			$table->string('text')->nullable();
			$table->string('note')->nullable();
			$table->timestamps();			
			$table->primary(array('tender_id','name'));
			$table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tender_documents');
	}

}
