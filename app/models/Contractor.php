<?php

class Contractor extends Eloquent {
	
	protected $table = 'contractors';

	public function owner(){
		return $this->belongsTo('User','user_id');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}
}