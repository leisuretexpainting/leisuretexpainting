<?php

class Contact extends Eloquent {
	
	protected $table = 'contacts';

	public function contractor(){
		return $this->belongsTo('Contractor','contractor_id');
	}
}