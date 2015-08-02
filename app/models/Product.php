<?php

class Product extends Eloquent {

	use SoftDeletingTrait;
	
	public function category(){
		return $this->belongsTo('Category');
	}

	public function donations(){
		return $this->hasMany('Donation');
	}

}
