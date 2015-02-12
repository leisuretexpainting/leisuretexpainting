<?php

class QuotationItem extends Eloquent {
	
	protected $table 	= 'quotation_items';
	protected $fillable = array('quotation_id','item_id','substrate_code','quantity','unit','price');
	protected $appends 	= array('total');
	public $timestamps 	= false;

	public function getTotalAttribute(){
		return ($this->quantity > 0) ? $this->quantity * $this->price : 0;
	}
	public function quotation(){
		return $this->belongsTo('Quotation');
	}
}