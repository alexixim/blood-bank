<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTelephoneColumnToDonorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donors', function($table)
		{
		    $table->string('telephone')->after('gender');
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donors', function($table)
		{	
		    $table->dropColumn('telephone');
		});		}

}
