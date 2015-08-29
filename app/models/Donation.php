<?php

class Donation extends Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['donated_at'];

	public function donor(){
		return $this->belongsTo('Donor')->withTrashed();
	}

	public function location(){
		return $this->belongsTo('Location');
	}

	public function product(){
		return $this->belongsTo('Product');
	}

	public function scopeMobileCampaigns($query){
		return $query->join('locations', 'locations.id', '=', 'donations.location_id')
						->where('locations.location_type_id', '=', '3');
	}

	public function scopeLocationType($query, $location_type){
		return $query->join('locations', 'locations.id', '=', 'donations.location_id')
						->where('locations.location_type_id', '=', $location_type);
	}
}
