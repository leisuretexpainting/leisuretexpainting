<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices',function($table){
			$table->integer('item_id')->length(10)->unsigned();
			$table->integer('substrate_id')->length(10)->unsigned();
			$table->decimal('price',10,2)->default(0);
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
			$table->foreign('substrate_id')->references('id')->on('substrates')->onDelete('no action');
			$table->primary(array('item_id','substrate_id'));
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
		Schema::drop('prices');
	}

}
