<?php

class Donor extends Eloquent {

	use SoftDeletingTrait;
	
	public function bloodGroup(){
		return $this->belongsTo('BloodGroup');
	}

	public function donations(){
		return $this->hasMany('Donation');
	}

	public function getGenderNameAttribute(){
		switch($this->gender){
			case 1: 
				return 'Male';
				break;
			case 2: 
				return 'Female';
				break;
			default: 
				return 'Unspecified';
				break;
		}
	}

	public function getNameWithBloodGroupAttribute(){
		return $this->name . ' (' . $this->blood_group->name . ')';
	}
}
