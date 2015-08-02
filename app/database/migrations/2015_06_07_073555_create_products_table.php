<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->timestamps();
		    $table->softDeletes();
		});

		Schema::create('products', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('validity_period');
		    $table->integer('category_id');
		    $table->decimal('quantity', 10, 2);
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
		Schema::drop('categories');
		Schema::drop('products');
	}

}
