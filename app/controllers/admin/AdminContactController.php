<?php

class AdminContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['contacts'] = $this->contact_model->getAllDetails();
		return View::make('admin.contact.index',$this->data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->data['contractors'] = Contractor::all();
		return View::make('admin.contact.create',$this->data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$data = array(
					 'contractor_id' 	=> (isset($input['contractor_id'])) 	? $input['contractor_id'] 		: null
					,'grade' 			=> (isset($input['grade'])) 			? $input['grade'] 				: ''
					,'name' 			=> (isset($input['name'])) 				? $input['name'] 				: ''
					,'email' 			=> (isset($input['email'])) 			? $input['email'] 				: ''
					,'phone' 			=> (isset($input['phone'])) 			? $input['phone'] 				: ''
					,'address_street' 	=> (isset($input['address_street'])) 	? $input['address_street'] 		: null
					,'address_suburb' 	=> (isset($input['address_suburb'])) 	? $input['address_suburb'] 		: null
					,'address_state' 	=> (isset($input['address_state'])) 	? $input['address_state'] 		: null
					,'address_zip' 		=> (isset($input['address_zip'])) 		? $input['address_zip'] 		: null
				);

		$validation_rules = array(
					 'grade' 			=> 'required'
					,'name' 			=> 'required'
					,'email' 			=> ''
					,'phone' 			=> ''
					,'address_street' 	=> ''
					,'address_suburb' 	=> ''
					,'address_state' 	=> ''
					,'address_zip' 		=> ''
				);
		$validation_messages = array(
					 'grade.required' 	=> "Contact grade is required"
					,'name.required' 	=> "Contact name is required"
				);
		
		$validator = Validator::make($data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$newContactDetails = $this->contact_model->store($data);
				if($newContactDetails)
					return Response::json(array('success' => true,'data' => $newContactDetails));
				else
					return Response::json(array('success' => false,'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			return Response::json(array('success' => false,'error_message' => $error_messages));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['contact'] = $this->contact_model->getDetailsById($id);
		return View::make('admin.contact.show',$this->data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['contact'] 		= $this->contact_model->getDetailsById($id);
		$this->data['contractors'] 	= $this->contractor_model->getAllDetails();
		return View::make('admin.contact.edit',$this->data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::get();
		$data = array(
					 'id' 				=> $id
					,'contractor_id' 	=> (isset($input['contractor_id'])) 	? $input['contractor_id'] 		: null
					,'grade' 			=> (isset($input['grade'])) 			? $input['grade'] 				: ''
					,'name' 			=> (isset($input['name'])) 				? $input['name'] 				: ''
					,'email' 			=> (isset($input['email'])) 			? $input['email'] 				: ''
					,'phone' 			=> (isset($input['phone'])) 			? $input['phone'] 				: ''
					,'address_street' 	=> (isset($input['address_street'])) 	? $input['address_street'] 		: null
					,'address_suburb' 	=> (isset($input['address_suburb'])) 	? $input['address_suburb'] 		: null
					,'address_state' 	=> (isset($input['address_state'])) 	? $input['address_state'] 		: null
					,'address_zip' 		=> (isset($input['address_zip'])) 		? $input['address_zip'] 		: null
				);

		$validation_rules = array(
					 'grade' 			=> 'required'
					,'name' 			=> 'required'
					,'email' 			=> ''
					,'phone' 			=> ''
					,'address_street' 	=> ''
					,'address_suburb' 	=> ''
					,'address_state' 	=> ''
					,'address_zip' 		=> ''
				);
		$validation_messages = array(
					 'grade.required' 	=> "Contact grade is required"
					,'name.required' 	=> "Contact name is required"
				);
		
		$validator = Validator::make($data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$contactDetails = $this->contact_model->edit($data);
				if($contactDetails)
					return Response::json(array('success' => true,'data' => $contactDetails));
				else
					return Response::json(array('success' => false,'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			return Response::json(array('success' => false,'error_message' => $error_messages));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
