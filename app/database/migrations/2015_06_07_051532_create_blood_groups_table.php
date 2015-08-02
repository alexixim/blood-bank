<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blood_groups', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		});

		DB::table('blood_groups')->insert(array(
			array('name' => 'A+'),
			array('name' => 'A-'),
			array('name' => 'B+'),
			array('name' => 'B-'),
			array('name' => 'AB+'),
			array('name' => 'AB-'),
			array('name' => 'O+'),
			array('name' => 'O-')
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blood_groups');
	}

}
