<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotation_items', function($table){
			$table->integer('quotation_id')->length(10)->unsigned();
			$table->integer('item_id')->length(10)->unsigned();
			$table->string('substrate_code');
			$table->integer('quantity');
			$table->string('unit')->nullable();
			$table->decimal('price',10,2)->default(0);
			$table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('no action');
			$table->foreign('substrate_code')->references('code')->on('substrates')->onDelete('no action');
			$table->primary(array('quotation_id','item_id','substrate_code'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quotation_items');
	}

}
