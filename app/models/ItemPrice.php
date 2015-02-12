<?php

class ItemPrice extends Eloquent {
	
	protected $table = 'item_prices';
	protected $fillable = array('substrate_code','price');

	public function item(){
		return $this->belongsTo('Item');
	}

	public function substrate(){
		return $this->belongsTo('Substrate');
	}
}