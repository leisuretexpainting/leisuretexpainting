<?php
class AdminTenderController extends BaseController {
	
	public function index()
	{
		$this->data['tenders'] = $this->tender_model->getAllDetails();
		return View::make('admin/tender_list',$this->data);
	}

	public function create()
	{
		$this->data['sales_representatives'] 	= User::Sales()->get();
		$this->data['job_types'] 				= JobType::get();
		return View::make('admin/tender_create',$this->data);
	}

	public function store()
	{
		$input = Input::get();
		$contractor_id 	= (isset($input['contractor_id']) && !empty($input['contractor_id'])) 	? $input['contractor_id'] 	: null;
		$contact_id 	= (isset($input['contact_id']) && !empty($input['contact_id'])) 		? $input['contact_id'] 		: null;
		$new_contractor = (isset($input['new_contractor']) && $input['new_contractor'] == 1) 	? true : false;
		$new_contact 	= (isset($input['new_contact']) && $input['new_contact'] == 1) 			? true : false;

		$contractor = array(
					 'contractor_id' 						=> $contractor_id
					,'contractor_name' 						=> (isset($input['contractor_name'])) 						? $input['contractor_name'] 						: ''
					,'contractor_business_address_street' 	=> (isset($input['contractor_business_address_street'])) 	? $input['contractor_business_address_street'] 		: null
					,'contractor_business_address_suburb' 	=> (isset($input['contractor_business_address_suburb'])) 	? $input['contractor_business_address_suburb'] 		: null
					,'contractor_business_address_state' 	=> (isset($input['contractor_business_address_state'])) 	? $input['contractor_business_address_state'] 		: null
					,'contractor_business_address_zip' 		=> (isset($input['contractor_business_address_zip'])) 		? $input['contractor_business_address_zip'] 		: null
					,'contractor_postal_address_street' 	=> (isset($input['contractor_postal_address_street'])) 		? $input['contractor_postal_address_street'] 		: null
					,'contractor_postal_address_suburb' 	=> (isset($input['contractor_postal_address_suburb'])) 		? $input['contractor_postal_address_suburb'] 		: null
					,'contractor_postal_address_state' 		=> (isset($input['contractor_postal_address_state'])) 		? $input['contractor_postal_address_state'] 		: null
					,'contractor_postal_address_zip' 		=> (isset($input['contractor_postal_address_zip'])) 		? $input['contractor_postal_address_zip'] 			: null
					,'contractor_abn' 						=> (isset($input['contractor_abn'])) 						? $input['contractor_abn'] 							: null
				);

		$contact = array(
					 'contact_id' 		=> $contact_id 
					,'contact_grade' 	=> ($new_contact) 	? $input['new_contact_grade'] 		: $input['contact_grade']
					,'contact_name' 	=> ($new_contact) 	? $input['new_contact_name'] 		: $input['contact_name']
					,'contact_email' 	=> ($new_contact) 	? $input['new_contact_email'] 		: $input['contact_email']
					,'contact_phone' 	=> ($new_contact) 	? $input['new_contact_phone'] 		: $input['contact_phone']
				);
		
		$job = array(
				 'job_due_date' 		=> (isset($input['job_due_date'])) 			? date('Y-m-d',strtotime($input['job_due_date'])) : ''
				,'job_sales_id' 		=> (isset($input['job_sales_id'])) 			? $input['job_sales_id'] 		: ''
				,'job_name' 			=> (isset($input['job_name'])) 				? $input['job_name'] 			: ''
				,'job_type_id' 			=> (isset($input['job_type_id'])) 			? $input['job_type_id'] 		: ''
				,'job_address_street' 	=> (isset($input['job_address_street'])) 	? $input['job_address_street'] 	: ''
				,'job_address_suburb' 	=> (isset($input['job_address_suburb'])) 	? $input['job_address_suburb'] 	: ''
				,'job_address_state' 	=> (isset($input['job_address_state'])) 	? $input['job_address_state'] 	: ''
				,'job_address_zip' 		=> (isset($input['job_address_zip'])) 		? $input['job_address_zip'] 	: ''

			);

		$uploaded_documents = array();
		if(isset($input['upload_name']) && sizeof($input['upload_name']) > 0){
			$uploaded_documents['uploaded_documents'] = array();
			foreach ($input['upload_name'] as $key => $name){
				$uploaded_documents['uploaded_documents'][$key]['name'] = $name;
				$uploaded_documents['uploaded_documents'][$key]['text'] = $input['upload_text'][$key];
				$uploaded_documents['uploaded_documents'][$key]['note'] = $input['upload_note'][$key];
			}
		}

		$validation_rules = array(
					 'contractor_id' 						=> ($new_contractor == false && $contractor_id == null) ? 'required' : ''
					,'contractor_name' 						=> ($new_contractor == true) ? 'required|unique:contractors,name' : 'required'
					,'contractor_business_address_street' 	=> ''
					,'contractor_business_address_suburb' 	=> ''
					,'contractor_business_address_state' 	=> ''
					,'contractor_business_address_zip' 		=> ''
					,'contractor_postal_address_street' 	=> ''
					,'contractor_postal_address_suburb' 	=> ''
					,'contractor_postal_address_state' 		=> ''
					,'contractor_postal_address_zip' 		=> ''
					,'contractor_abn' 						=> ''
					,'contact_id' 							=> ($new_contractor == false && $contractor_id != null && $new_contact == false) ? 'required' 			: ''
					,'contact_name' 						=> 'required'
					,'contact_email' 						=> 'required'
					,'contact_phone' 						=> 'required'
					,'contact_grade' 						=> 'required'
					,'job_due_date' 						=> 'required'
					,'job_sales_id' 						=> 'required'
					,'job_name' 							=> 'required|unique:jobs,name'
					,'job_type_id' 							=> 'required'
					,'job_address_zip' 						=> ''
					,'job_address_suburb' 					=> ''
					,'job_address_state' 					=> ''
					,'job_address_zip' 						=> ''
				);
		$validation_messages = array(
					 'contractor_id.required' 				=> "Contractor details doesn't exist"
					,'contractor_name.required' 			=> "Contractor name is required"
					,'contractor_name.unique' 				=> "Contractor name already exist"
					,'contractor_abn.required' 				=> "Contractor's ABN is required"
					,'contractor_abn.unique' 				=> "Contractor's ABN already exist"
					,'contact_grade.required' 				=> "Contact grade is required"
					,'contact_id.required' 					=> "Select contact details"
					,'contact_name.required' 				=> "Contact name is required"
					,'contact_email.required' 				=> "Contact email address is required"
					,'contact_email.unique' 				=> "Contact email address has been taken"
					,'contact_phone.required'				=> "Contact phone number is required"
					,'job_due_date.required' 				=> 'Job due date is required'
					,'job_sales_id.required' 				=> 'Job sales representative is required'
					,'job_name.required' 					=> 'Job name is required'
					,'job_name.unique' 						=> 'Job name already exists'
					,'job_type_id.required' 				=> 'Job type is required'
				);

		$tender_data = array_merge($contractor,$contact,$job,$uploaded_documents);		
		$validator = Validator::make($tender_data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$newTenderDetails = $this->tender_model->store($tender_data);
				if($newTenderDetails)
					return Response::json(array('success' => true,'data' => $newTenderDetails));
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

	public function show($id)
	{
		$this->data['tender'] = $this->tender_model->getDetailsById($id);
		return View::make('admin/tender_details',$this->data);
	}

	public function edit($id)
	{
		$this->data['tender'] 					= $this->tender_model->getDetailsById($id);
		$this->data['tender_status'] 			= TenderStatus::all();
		$this->data['sales_representatives'] 	= User::Sales()->get();
		$this->data['job_types'] 				= JobType::get();
		return View::make('admin/tender_edit',$this->data);
	}

	public function update($id)
	{
		$input = Input::get();
		$tender_id 		= $input['tender_id'];
		$tender_details = $this->tender_model->getDetailsById($tender_id);
		$contractor_id 	= (isset($input['contractor_id']) && !empty($input['contractor_id'])) 	? $input['contractor_id'] 	: null;
		$contact_id 	= (isset($input['contact_id']) && !empty($input['contact_id'])) 		? $input['contact_id'] 		: null;
		$new_contractor = (isset($input['new_contractor']) && $input['new_contractor'] == 1) 	? true : false;
		$new_contact 	= (isset($input['new_contact']) && $input['new_contact'] == 1) 			? true : false;
		$tender_data = array('tender_id'=>$tender_id,'tender_status'=>$input['tender_status']);
		$contractor = array(
					 'contractor_id' 						=> $contractor_id
					,'contractor_name' 						=> (isset($input['contractor_name'])) 						? $input['contractor_name'] 						: ''
					,'contractor_business_address_street' 	=> (isset($input['contractor_business_address_street'])) 	? $input['contractor_business_address_street'] 		: null
					,'contractor_business_address_suburb' 	=> (isset($input['contractor_business_address_suburb'])) 	? $input['contractor_business_address_suburb'] 		: null
					,'contractor_business_address_state' 	=> (isset($input['contractor_business_address_state'])) 	? $input['contractor_business_address_state'] 		: null
					,'contractor_business_address_zip' 		=> (isset($input['contractor_business_address_zip'])) 		? $input['contractor_business_address_zip'] 		: null
					,'contractor_postal_address_street' 	=> (isset($input['contractor_postal_address_street'])) 		? $input['contractor_postal_address_street'] 		: null
					,'contractor_postal_address_suburb' 	=> (isset($input['contractor_postal_address_suburb'])) 		? $input['contractor_postal_address_suburb'] 		: null
					,'contractor_postal_address_state' 		=> (isset($input['contractor_postal_address_state'])) 		? $input['contractor_postal_address_state'] 		: null
					,'contractor_postal_address_zip' 		=> (isset($input['contractor_postal_address_zip'])) 		? $input['contractor_postal_address_zip'] 			: null
					,'contractor_abn' 						=> (isset($input['contractor_abn'])) 						? $input['contractor_abn'] 							: null
				);

		$contact = array(
					 'contact_id' 		=> $contact_id 
					,'contact_grade' 	=> ($new_contact) 	? $input['new_contact_grade'] 		: $input['contact_grade']
					,'contact_name' 	=> ($new_contact) 	? $input['new_contact_name'] 		: $input['contact_name']
					,'contact_email' 	=> ($new_contact) 	? $input['new_contact_email'] 		: $input['contact_email']
					,'contact_phone' 	=> ($new_contact) 	? $input['new_contact_phone'] 		: $input['contact_phone']
				);
		
		$job = array(
				 'job_due_date' 		=> (isset($input['job_due_date'])) 			? date('Y-m-d',strtotime($input['job_due_date'])) : ''
				,'job_sales_id' 		=> (isset($input['job_sales_id'])) 			? $input['job_sales_id'] 		: ''
				,'job_name' 			=> (isset($input['job_name'])) 				? $input['job_name'] 			: ''
				,'job_type_id' 			=> (isset($input['job_type_id'])) 			? $input['job_type_id'] 		: ''
				,'job_address_street' 	=> (isset($input['job_address_street'])) 	? $input['job_address_street'] 	: ''
				,'job_address_suburb' 	=> (isset($input['job_address_suburb'])) 	? $input['job_address_suburb'] 	: ''
				,'job_address_state' 	=> (isset($input['job_address_state'])) 	? $input['job_address_state'] 	: ''
				,'job_address_zip' 		=> (isset($input['job_address_zip'])) 		? $input['job_address_zip'] 	: ''

			);

		$uploaded_documents = array();
		if(isset($input['upload_name']) && sizeof($input['upload_name']) > 0){
			$uploaded_documents['uploaded_documents'] = array();
			foreach ($input['upload_name'] as $key => $name){
				$uploaded_documents['uploaded_documents'][$key]['name'] = $name;
				$uploaded_documents['uploaded_documents'][$key]['text'] = $input['upload_text'][$key];
				$uploaded_documents['uploaded_documents'][$key]['note'] = $input['upload_note'][$key];
			}
		}

		$validation_rules = array(
					 'contractor_id' 						=> ($new_contractor == false && $contractor_id == null) ? 'required' : ''
					,'contractor_name' 						=> ($new_contractor == true) ? 'required|unique:contractors' : 'required'
					,'contractor_business_address_street' 	=> ''
					,'contractor_business_address_suburb' 	=> ''
					,'contractor_business_address_state' 	=> ''
					,'contractor_business_address_zip' 		=> ''
					,'contractor_postal_address_street' 	=> ''
					,'contractor_postal_address_suburb' 	=> ''
					,'contractor_postal_address_state' 		=> ''
					,'contractor_postal_address_zip' 		=> ''
					,'contractor_abn' 						=> ''
					,'contact_id' 							=> ($new_contractor == false && $contractor_id != null && $new_contact == false) ? 'required' 			: ''
					,'contact_name' 						=> 'required'
					,'contact_email' 						=> 'required'
					,'contact_phone' 						=> 'required'
					,'contact_grade' 						=> 'required'
					,'job_due_date' 						=> 'required'
					,'job_sales_id' 						=> 'required'
					,'job_name' 							=> (isset($job['job_name']) && $job['job_name'] == $tender_details->job->name) ? 'required' : 'required|unique:jobs,name'
					,'job_type_id' 							=> 'required'
					,'job_address_zip' 						=> ''
					,'job_address_suburb' 					=> ''
					,'job_address_state' 					=> ''
					,'job_address_zip' 						=> ''
				);
		$validation_messages = array(
					 'contractor_id.required' 				=> "Contractor details doesn't exist"
					,'contractor_name.required' 			=> "Contractor name is required"
					,'contractor_name.unique' 				=> "Contractor name already exist"
					,'contractor_abn.required' 				=> "Contractor's ABN is required"
					,'contractor_abn.unique' 				=> "Contractor's ABN already exist"
					,'contact_grade.required' 				=> "Contact grade is required"
					,'contact_id.required' 					=> "Select contact details"
					,'contact_name.required' 				=> "Contact name is required"
					,'contact_email.required' 				=> "Contact email address is required"
					,'contact_email.unique' 				=> "Contact email address has been taken"
					,'contact_phone.required'				=> "Contact phone number is required"
					,'job_due_date.required' 				=> 'Job due date is required'
					,'job_sales_id.required' 				=> 'Job sales representative is required'
					,'job_name.required' 					=> 'Job name is required'
					,'job_name.unique' 						=> 'Job name already exists'
					,'job_type_id.required' 				=> 'Job type is required'
				);

		$tender_data = array_merge($tender_data,$contractor,$contact,$job,$uploaded_documents);		
		$validator = Validator::make($tender_data,$validation_rules,$validation_messages);
		
		if($validator->passes()){
				$result = $this->tender_model->edit($tender_data);
				if($result)
					return Response::json(array('success' => true,'data' => $result));
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

	public function destroy($id)
	{
		return Response::json(array('success'=>Tender::where('id',$id)->delete()));
	}
}
