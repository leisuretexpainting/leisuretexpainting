<?php

class Quotation extends Eloquent {
	
	protected $table 	= 'quotations';
	protected $fillable = array('tender_id');
	protected $appends 	= array('total');

	public function getDetailsById($id){
		return Quotation::with('tender','items')->where('id',$id)->first();
	}

	public function getAllDetails(){
		return Quotation::with('tender','items')->get();		
	}

	public function store($data){
		$quotation = new Quotation;
		$quotation->tender_id 		= $data['tender_id'];
		$quotation->quotation_by 	= $data['quotation_by'];
		$items = $data['items'];
		if($quotation->save()){
			$quotation_items = array();
			foreach($items as $item){
				$quotation_items[] = new QuotationItem(array(
														 'item_id'			=> $item['id']
														,'substrate_code'	=> $item['substrate_code']
														,'quantity'			=> $item['quantity']
														,'unit'				=> $item['unit']
														,'price'			=> $item['price']
													)
									);
			}
			$quotation->items()->saveMany($quotation_items);

			return $this->getDetailsById($quotation->id);
		}else
			return false;
	}

	public function getTotalAttribute(){
		return $this->items()->get()->sum('total');
	}
	public function tender(){
		return $this->belongsTo('Tender');
	}
	public function items(){
		return $this->hasMany('QuotationItem');
	}
}