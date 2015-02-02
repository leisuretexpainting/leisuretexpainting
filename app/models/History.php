<?php

class History extends Eloquent {
	
	protected $table = 'history';
	protected $fillable = array('event');

	public function historable(){
		return $this->morphTo();
	}

}