<?php

class Adjustment extends Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['adjustment_date'];

	public function location(){
		return $this->belongsTo('Location');
	}

	public function product(){
		return $this->belongsTo('Product');
	}
}
