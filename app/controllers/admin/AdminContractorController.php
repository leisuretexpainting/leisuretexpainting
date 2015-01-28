<?php

class AdminContractorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['contractors'] = $this->contractor_model->getAllDetails();
		return View::make('admin/contractor_list',$this->data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/contractor_create',$this->data);
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
					 'name' 					=> (isset($input['name'])) 						? $input['name'] 						: ''
					,'email' 					=> (isset($input['email'])) 					? $input['email'] 						: ''
					,'phone' 					=> (isset($input['phone'])) 					? $input['phone'] 						: ''
					,'business_address_street' 	=> (isset($input['business_address_street'])) 	? $input['business_address_street'] 	: null
					,'business_address_suburb' 	=> (isset($input['business_address_suburb'])) 	? $input['business_address_suburb'] 	: null
					,'business_address_state' 	=> (isset($input['business_address_state'])) 	? $input['business_address_state'] 		: null
					,'business_address_zip' 	=> (isset($input['business_address_zip'])) 		? $input['business_address_zip'] 		: null
					,'postal_address_street' 	=> (isset($input['postal_address_street'])) 	? $input['postal_address_street'] 		: null
					,'postal_address_suburb' 	=> (isset($input['postal_address_suburb'])) 	? $input['postal_address_suburb'] 		: null
					,'postal_address_state' 	=> (isset($input['postal_address_state'])) 		? $input['postal_address_state'] 		: null
					,'postal_address_zip' 		=> (isset($input['postal_address_zip'])) 		? $input['postal_address_zip'] 			: null
					,'abn' 						=> (isset($input['abn'])) 						? $input['abn'] 						: null
				);

		$validation_rules = array(
					 'name' 					=> 'required|unique:contractors,name'
					,'email' 					=> 'required'
					,'phone' 					=> 'required'
					,'business_address_street' 	=> ''
					,'business_address_suburb' 	=> ''
					,'business_address_state' 	=> ''
					,'business_address_zip' 	=> ''
					,'postal_address_street' 	=> ''
					,'postal_address_suburb' 	=> ''
					,'postal_address_state' 	=> ''
					,'postal_address_zip' 		=> ''
					,'abn' 						=> ''
				);
		$validation_messages = array(
					 'name.required' 			=> "Contractor name is required"
					,'name.unique' 				=> "Contractor name already exist"
					,'phone.required' 			=> "Contact number is required"
					,'email.required' 			=> "Email address is required"
					,'abn.required' 			=> "ABN is required"
					,'abn.unique' 				=> "ABN already exist"
				);
		
		$validator = Validator::make($data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$newContractorDetails = $this->contractor_model->store($data);
				if($newContractorDetails)
					return Response::json(array('success' => true,'data' => $newContractorDetails));
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
		$this->data['contractor'] = $this->contractor_model->getDetailsById($id);
		return View::make('admin/contractor_details',$this->data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['contractor'] = $this->contractor_model->getDetailsById($id);
		return View::make('admin/contractor_edit',$this->data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contractor = Contractor::find($id);
		$input 		= Input::get();
		$data = array(
					'id' 						=> $id
					,'name' 					=> (isset($input['name'])) 						? $input['name'] 						: ''
					,'email' 					=> (isset($input['email'])) 					? $input['email'] 						: ''
					,'phone' 					=> (isset($input['phone'])) 					? $input['phone'] 						: ''
					,'business_address_street' 	=> (isset($input['business_address_street'])) 	? $input['business_address_street'] 	: null
					,'business_address_suburb' 	=> (isset($input['business_address_suburb'])) 	? $input['business_address_suburb'] 	: null
					,'business_address_state' 	=> (isset($input['business_address_state'])) 	? $input['business_address_state'] 		: null
					,'business_address_zip' 	=> (isset($input['business_address_zip'])) 		? $input['business_address_zip'] 		: null
					,'postal_address_street' 	=> (isset($input['postal_address_street'])) 	? $input['postal_address_street'] 		: null
					,'postal_address_suburb' 	=> (isset($input['postal_address_suburb'])) 	? $input['postal_address_suburb'] 		: null
					,'postal_address_state' 	=> (isset($input['postal_address_state'])) 		? $input['postal_address_state'] 		: null
					,'postal_address_zip' 		=> (isset($input['postal_address_zip'])) 		? $input['postal_address_zip'] 			: null
					,'abn' 						=> (isset($input['abn'])) 						? $input['abn'] 						: null
				);

		$validation_rules = array(
					 'name' 					=> (isset($input['name']) && $input['name'] == $contractor->name) ? 'required' 	: 'required|unique:contractors'
					,'email' 					=> 'required'
					,'phone' 					=> 'required'
					,'business_address_street' 	=> ''
					,'business_address_suburb' 	=> ''
					,'business_address_state' 	=> ''
					,'business_address_zip' 	=> ''
					,'postal_address_street' 	=> ''
					,'postal_address_suburb' 	=> ''
					,'postal_address_state' 	=> ''
					,'postal_address_zip' 		=> ''
					,'abn' 						=> ''
				);
		$validation_messages = array(
					 'name.required' 			=> "Contractor name is required"
					,'name.unique' 				=> "Contractor name already exist"
					,'phone.required' 			=> "Contact number is required"
					,'email.required' 			=> "Email address is required"
					,'abn.required' 			=> "ABN is required"
					,'abn.unique' 				=> "ABN already exist"
				);
		
		$validator = Validator::make($data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$contactorDetails = $this->contractor_model->edit($data);
				if($contactorDetails)
					return Response::json(array('success' => true,'data' => $contactorDetails));
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
		return Response::json(array('success'=>Contractor::where('id',$id)->delete()));
	}


}
