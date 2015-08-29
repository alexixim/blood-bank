<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('adjustments', function($table)
		{
		    $table->increments('id');
		    $table->string('type');
		    $table->dateTime('adjustment_date');
		    $table->string('description');

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
		Schema::drop('adjustments');
	}

}
