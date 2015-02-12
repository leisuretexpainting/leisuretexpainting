<?php

class Item extends Eloquent {

	protected $table = 'items';	

	public function getDetailsById($id){
		return Item::with('prices','category')->where('id',$id)->first();
	}

	public function getAllDetails(){
		return Item::with('prices','category')->get();		
	}

	public function store($data){
		$item 					= new Item;
		$item->name 			= (isset($data['name']) && !empty($data['name'])) ? $data['name'] : null;
		$item->description 		= (isset($data['description']) && !empty($data['description'])) 	? $data['description'] 	: null;
		$item->category_code 	= 'P';
		if($item->save()){
			
			$item_prices = array();
			foreach($data['prices'] as $substrate => $price){
				$item_prices[] = new ItemPrice(array('substrate_code'=>$substrate,'price'=>$price));
			}
			$item->prices()->saveMany($item_prices);

			return $this->getDetailsById($item->id);
		}else
			return false;
	}

	public function edit($data){
		
		$id 				= $data['id'];
		$item 				= Item::find($id);

		if($item){

			$item->name 		= (isset($data['name']) && !empty($data['name'])) 					? $data['name'] 		: $item->name;
			$item->description 	= (isset($data['description']) && !empty($data['description'])) 	? $data['description'] 	: $item->description;
			$item_prices 		= (isset($data['prices']) && sizeof($data['prices']) > 0) 			? $data['prices'] 		: false;
			$item->save();

			if($item_prices){
				foreach($item_prices as $substrate_code => $price){
					$update = ItemPrice::where('substrate_code',$substrate_code)->where('item_id',$item->id)->update(array('price'=>$price));
					if(!$update) { $item->prices()->save(new ItemPrice(array('substrate_code'=>$substrate_code,'price'=>$price))); }
				}
			}

			return $this->getDetailsById($item->id);
		}else
			return false;
	}

	public function prices(){
		return $this->hasMany('ItemPrice');
	}

	public function category(){
		return $this->belongsTo('Category','category_code','code');
	}
}