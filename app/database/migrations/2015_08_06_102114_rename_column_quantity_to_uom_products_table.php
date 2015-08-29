<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnQuantityToUomProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

		Schema::table('products', function($table)
		{
		    $table->dropColumn('quantity');
		});

		Schema::table('products', function($table)
		{
		    $table->string('uom')->after('category_id');
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

		Schema::table('products', function($table)
		{
		    $table->dropColumn('uom');
		});

		
	}

}
