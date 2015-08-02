<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donors', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('nic');
		    $table->date('dob');
		    $table->tinyInteger('blood_group_id');
		    $table->tinyInteger('gender');
		    $table->string('email', 200);
		    $table->string('address');
		    $table->text('details');
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
		Schema::drop('donors');
	}

}
