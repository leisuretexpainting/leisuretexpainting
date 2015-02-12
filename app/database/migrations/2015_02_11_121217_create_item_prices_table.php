<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_prices',function($table){
			$table->integer('item_id')->length(10)->unsigned();
			$table->string('substrate_code');
			$table->decimal('price',10,2)->default(0);
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			$table->foreign('substrate_code')->references('code')->on('substrates')->onDelete('no action');
			$table->primary(array('item_id','substrate_code'));
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
		Schema::drop('item_prices');
	}

}
