<?php

class Category extends Eloquent {

	public function products(){
		return $this->hasMany('Product');
	}
}
