<?php

class LocationsTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('locations')->truncate();

		$locationClusterCmb = new Location();
		$locationClusterCmb->code = "CLS_001";
		$locationClusterCmb->name = "Colombo";
		$locationClusterCmb->location_type_id = 1;
		$locationClusterCmb->parent_location_id = 0;
		$locationClusterCmb->save();

		$locationRegMah = new Location();
		$locationRegMah->code = "REG_001";
		$locationRegMah->name = "Maharagama";
		$locationRegMah->location_type_id = 2;
		$locationRegMah->parent_location_id = $locationClusterCmb->id;
		$locationRegMah->save();

		$locationRegG5 = new Location();
		$locationRegG5->code = "REG_002";
		$locationRegG5->name = "Gampaha";
		$locationRegG5->location_type_id = 2;
		$locationRegG5->parent_location_id = $locationClusterCmb->id;
		$locationRegG5->save();

		$locationTmpNug = new Location();
		$locationTmpNug->code = "TMP_001";
		$locationTmpNug->name = "Nugegoda";
		$locationTmpNug->location_type_id = 3;
		$locationTmpNug->parent_location_id = $locationRegMah->id;
		$locationTmpNug->save();
	}
}
		
