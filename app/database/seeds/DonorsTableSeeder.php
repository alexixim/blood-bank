<?php

class DonorsTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('donors')->truncate();

		$donor = new Donor();
		$donor->name = "Lorem Ipsum";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 1;
		$donor->gender = 1;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Dolar Sit";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 2;
		$donor->gender = 2;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Amet Lo";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 1;
		$donor->gender = 1;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Consectetur";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 4;
		$donor->gender = 2;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Voluptatem";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 6;
		$donor->gender = 2;
		$donor->save();
		$donor = new Donor();
		$donor->name = "Lorem Ipsum";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 1;
		$donor->gender = 1;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Dolar Sit";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 2;
		$donor->gender = 2;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Amet Lo";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 1;
		$donor->gender = 1;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Consectetur";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 4;
		$donor->gender = 2;
		$donor->save();

		$donor = new Donor();
		$donor->name = "Voluptatem";
		$donor->dob = '1980-10-10';
		$donor->blood_group_id = 6;
		$donor->gender = 2;
		$donor->save();
	}
}
		
