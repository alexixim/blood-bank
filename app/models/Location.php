<?php

class Location extends Eloquent {

	use SoftDeletingTrait;
	
	public function type(){
		return $this->belongsTo('LocationType', 'location_type_id');
	}

	public function parent(){
		return $this->belongsTo('Location', 'parent_location_id', 'id');
	}

	public function getNameWithParentAttribute(){
		return ($this->parent) ? $this->name_with_code . ' - ' . $this->parent_name : $this->name_with_code;
	}

	public function getParentNameAttribute(){
		return ($this->parent) ? $this->parent->name_with_code : '-';
	}

	public function getNameWithCodeAttribute(){
		return $this->name . ' (' . $this->code . ')'; 
	}
}
