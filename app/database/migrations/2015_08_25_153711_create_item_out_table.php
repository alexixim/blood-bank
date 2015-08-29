<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('item_out', function($table)
		{
		    $table->increments('id');
		    $table->integer('location_id');
		    $table->integer('product_id');
		    $table->float('quantity');
		    $table->integer('adjustment_id');
		    $table->integer('transfer_id');

		    $table->timestamps();
		    $table->softDeletes();

		});	}

	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */

	public function down()
	{
		//
		Schema::drop('item_out');
	}

}
