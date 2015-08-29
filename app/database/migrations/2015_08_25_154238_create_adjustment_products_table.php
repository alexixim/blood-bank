<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('adjustment_products', function($table)
		{
		    $table->increments('id');
		    $table->integer('adjustment_id');
		    $table->integer('product_id');
		    $table->integer('location_id');
		    $table->float('quantity');
		    
		    $table->timestamps();
		    $table->softDeletes();
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('adjustment_products');
	}

}
