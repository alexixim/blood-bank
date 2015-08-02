<?php

class ProductsTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('categories')->truncate();
		DB::table('products')->truncate();

		$category = new Category();
		$category->name = "Blood";
		$category->save();

		foreach(BloodGroup::all() as $bg){
			$product = new Product();
			$product->name = $bg->name;
			$product->validity_period = 120;
			$product->category_id = $category->id;
			$product->save();
		}

		$category = new Category();
		$category->name = "General";
		$category->save();

	}
}
		
