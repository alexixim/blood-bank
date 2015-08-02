<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function($table)
		{
		    $table->increments('id');
		    $table->string('code');
		    $table->string('name');
		    $table->longText('address');
		    $table->string('email');
		    $table->string('contact_no');
		    $table->string('location_type_id');
		    $table->string('parent_location_id');
		    $table->string('valid_till');
		    $table->string('created_by');
		    $table->longText('organizer_details');
		    $table->timestamps();
		    $table->softDeletes();
		});

		Schema::create('location_types', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->integer('level');
		});

		$lt = new LocationType();
		$lt->name = 'Cluster Head';
		$lt->level = 1;
		$lt->save();

		$lt = new LocationType();
		$lt->name = 'Regional Hospital';
		$lt->level = 2;
		$lt->save();

		$lt = new LocationType();
		$lt->name = 'Mobile Campaign';
		$lt->level = 3;
		$lt->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
		Schema::drop('location_types');
	}

}
