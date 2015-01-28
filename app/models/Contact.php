<?php

class Contact extends Eloquent {
	
	protected $table = 'contacts';

	public function getDetailsById($id){
		return Contact::with('contractor')->where('id',$id)->first();
	}

	public function getAllDetails(){
		return Contact::with('contractor')->get();		
	}

	public function store($data){
		$contact 					= new Contact;
		$contact->contractor_id 	= (isset($data['contractor_id']) && !empty($data['contractor_id'])) ? $data['contractor_id'] : null;
		$contact->grade 			= $data['grade'];
		$contact->name 				= $data['name'];
		$contact->email 			= $data['email'];
		$contact->phone 			= $data['phone'];
		$contact->address_street 	= (isset($data['address_street']) && !empty($data['address_street'])) 	? $data['address_street'] 	: null;
		$contact->address_suburb 	= (isset($data['address_suburb']) && !empty($data['address_suburb'])) 	? $data['address_suburb'] 	: null;
		$contact->address_state 	= (isset($data['address_state']) && !empty($data['address_state'])) 	? $data['address_state'] 	: null;
		$contact->address_zip 		= (isset($data['address_zip']) && !empty($data['address_zip'])) 		? $data['address_zip'] 		: null;
		if($contact->save())
			return $contact;
		else
			return false;
	}

	public function edit($data){
		$id 							= $data['id'];
		$contact 						= Contact::find($id);
		if($contact){
			$contact->contractor_id 	= (isset($data['contractor_id'])) 		? $data['contractor_id'] 	: $contact->contractor_id;
			$contact->grade 			= (isset($data['grade'])) 				? $data['grade'] 			: $contact->grade;
			$contact->name 				= (isset($data['name'])) 				? $data['name'] 			: $contact->name;
			$contact->email 			= (isset($data['email'])) 				? $data['email'] 			: $contact->email;
			$contact->phone 			= (isset($data['phone'])) 				? $data['phone'] 			: $contact->phone;
			$contact->address_street 	= (isset($data['address_street'])) 		? $data['address_street'] 	: $contact->address_street;
			$contact->address_suburb 	= (isset($data['address_suburb'])) 		? $data['address_suburb'] 	: $contact->address_suburb;
			$contact->address_state 	= (isset($data['address_state'])) 		? $data['address_state'] 	: $contact->address_state;
			$contact->address_zip 		= (isset($data['address_zip'])) 		? $data['address_zip'] 		: $contact->address_zip;
			if($contact->save())
				return $contact;
			else
				return false;
		}else
			return false;
	}

	public function contractor(){
		return $this->belongsTo('Contractor','contractor_id');
	}
}