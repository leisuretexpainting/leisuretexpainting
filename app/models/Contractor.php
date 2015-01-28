<?php

class Contractor extends Eloquent {
	
	protected $table = 'contractors';

	public function getDetailsById($id){
		return Contractor::with('contacts')->where('id',$id)->first();
	}

	public function getAllDetails(){
		return Contractor::with('contacts')->get();		
	}

	public function store($data){
		$contractor 							= new Contractor;
		$contractor->name 						= $data['name'];
		$contractor->email 						= $data['email'];
		$contractor->phone 						= $data['phone'];
		$contractor->business_address_street 	= (isset($data['business_address_street']) && !empty($data['business_address_street'])) ? $data['business_address_street'] 	: null;
		$contractor->business_address_suburb 	= (isset($data['business_address_suburb']) && !empty($data['business_address_suburb'])) ? $data['business_address_suburb'] 	: null;
		$contractor->business_address_state 	= (isset($data['business_address_state']) && !empty($data['business_address_state'])) 	? $data['business_address_state'] 	: null;
		$contractor->business_address_zip 		= (isset($data['business_address_zip']) && !empty($data['business_address_zip'])) 		? $data['business_address_zip'] 	: null;
		$contractor->postal_address_street 		= (isset($data['postal_address_street']) && !empty($data['postal_address_street'])) 	? $data['postal_address_street'] 	: null;
		$contractor->postal_address_suburb 		= (isset($data['postal_address_suburb']) && !empty($data['postal_address_suburb'])) 	? $data['postal_address_suburb'] 	: null;
		$contractor->postal_address_state 		= (isset($data['postal_address_state']) && !empty($data['postal_address_state'])) 		? $data['postal_address_state'] 	: null;
		$contractor->postal_address_zip 		= (isset($data['postal_address_zip']) && !empty($data['postal_address_zip'])) 			? $data['postal_address_zip'] 		: null;
		$contractor->abn 						= $data['abn'];
		if($contractor->save())
			return $contractor;
		else
			return false;
	}

	public function edit($data){
		$id 									= $data['id'];
		$contractor 							= Contractor::find($id);
		if($contractor){
			$contractor->name 						= (isset($data['name'])) 					? $data['name'] 					: $contractor->name;
			$contractor->email 						= (isset($data['email'])) 					? $data['email'] 					: $contractor->email;
			$contractor->phone 						= (isset($data['phone'])) 					? $data['phone'] 					: $contractor->phone;
			$contractor->business_address_street 	= (isset($data['business_address_street'])) ? $data['business_address_street'] 	: $contractor->business_address_street;
			$contractor->business_address_suburb 	= (isset($data['business_address_suburb'])) ? $data['business_address_suburb'] 	: $contractor->business_address_suburb;
			$contractor->business_address_state 	= (isset($data['business_address_state'])) 	? $data['business_address_state'] 	: $contractor->business_address_state;
			$contractor->business_address_zip 		= (isset($data['business_address_zip'])) 	? $data['business_address_zip'] 	: $contractor->business_address_zip;
			$contractor->postal_address_street 		= (isset($data['postal_address_street'])) 	? $data['postal_address_street'] 	: $contractor->postal_address_street;
			$contractor->postal_address_suburb 		= (isset($data['postal_address_suburb'])) 	? $data['postal_address_suburb'] 	: $contractor->postal_address_suburb;
			$contractor->postal_address_state 		= (isset($data['postal_address_state'])) 	? $data['postal_address_state'] 	: $contractor->postal_address_state;
			$contractor->postal_address_zip 		= (isset($data['postal_address_zip'])) 		? $data['postal_address_zip'] 		: $contractor->postal_address_zip;
			$contractor->abn 						= (isset($data['abn'])) 					? $data['abn'] 						: $contractor->abn;
			if($contractor->save())
				return $contractor;
			else
				return false;
		}else
			return false;
	}
	
	/*
	public function owner(){
		return $this->belongsTo('User','user_id');
	}
	*/

	public function contacts(){
		return $this->hasMany('Contact');
	}
}