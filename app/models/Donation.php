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
}
