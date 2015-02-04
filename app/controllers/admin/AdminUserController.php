<?php
class AdminUserController extends BaseController {
	
	public function index()
	{
		$this->data['users'] = $this->user_model->getAll();
		return View::make('admin.user.index',$this->data);
	}

	public function create()
	{
		$this->data['userRoles'] = $this->role_model->getAll();
		return View::make('admin.user.create',$this->data);
	}

	public function store()
	{
		$input = Input::get();
		$data = array(
					 'role_id' 					=> (isset($input['role_id'])) 				? $input['role_id'] 				: ''
					,'username' 				=> (isset($input['username'])) 				? $input['username'] 				: ''
					,'password' 				=> (isset($input['password'])) 				? $input['password'] 				: ''
					,'password_confirmation'	=> (isset($input['password_confirmation'])) ? $input['password_confirmation'] 	: false
					,'email' 					=> (isset($input['email'])) 				? $input['email'] 					: ''
					,'first_name' 				=> (isset($input['first_name'])) 			? $input['first_name'] 				: null
					,'last_name' 				=> (isset($input['last_name'])) 			? $input['last_name'] 				: null
					,'birthdate' 				=> (isset($input['birthdate'])) 			? $input['birthdate'] 				: null
					,'address' 					=> (isset($input['address'])) 				? $input['address'] 				: null
					,'city' 					=> (isset($input['city'])) 					? $input['city'] 					: null
					,'state' 					=> (isset($input['state'])) 				? $input['state'] 					: null
					,'zip_code' 				=> (isset($input['zip_code'])) 				? $input['zip_code'] 				: null
					,'country_code' 			=> (isset($input['country_code'])) 			? $input['country_code'] 			: null
					,'phone' 					=> (isset($input['phone'])) 				? $input['phone'] 					: null
				);
		$validation_rules = array(
					 'role_id' 						=> 'required'
					,'username' 					=> 'required|unique:users'
					,'password' 					=> (isset($input['password_confirmation']) && $input['password_confirmation'] != '') ? 'required|confirmed' : 'required'
					,'password_confirmation' 		=> (isset($input['password_confirmation'])) ? 'required' : ''
					,'email' 						=> 'required|email|unique:users'
					,'first_name' 					=> ''
					,'last_name' 					=> ''
					,'birthdate' 					=> ''
					,'address' 						=> ''
					,'city' 						=> ''
					,'state' 						=> ''
					,'zip_code' 					=> ''
					,'country_code' 				=> ''
					,'phone' 						=> ''
				);
		$validation_messages = array(
					 'role_id.required' 				=> 'User role is required'
					,'username.required' 				=> 'Username is required'
					,'username.unique' 					=> 'Username has been taken'
					,'password.required' 				=> 'Password is required'
					,'password_confirmation.confirmed' 	=> 'Password did not matched '
					,'password_confirmation.required' 	=> 'Re-type password'
					,'email.required' 					=> 'Email address is required'
					,'email.unique' 					=> 'Email address has been taken'
				);

		$validator = Validator::make($data,$validation_rules,$validation_messages);

		if($validator->passes()){
				$newUser = $this->user_model->store($data);
				if($newUser)
					echo json_encode(array('success' => true,'data' => $newUser));
				else
					echo json_encode(array('success' => false,'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			echo json_encode(array('success' => false,'error_message' => $error_messages));
		}
	}

	public function show($id)
	{
		$this->data['user'] = $this->user_model->getDetails($id);
		return View::make('admin.user.show',$this->data);
	}

	public function edit($id)
	{
		$this->data['userRoles'] 	= $this->role_model->getAll();
		$this->data['user'] 		= $this->user_model->getDetails($id);
		return View::make('admin.user.edit',$this->data);
	}

	public function update($id)
	{
		$input = Input::get();
		$user = $this->user_model->getDetails($id);
		$data = array(
					 'id' 						=> (isset($input['user_id'])) 				? $input['user_id'] 				: ''
					,'role_id' 					=> (isset($input['role_id'])) 				? $input['role_id'] 				: ''
					,'username' 				=> (isset($input['username'])) 				? $input['username'] 				: ''
					,'password' 				=> (isset($input['password'])) 				? $input['password'] 				: ''
					,'password_confirmation'	=> (isset($input['password_confirmation'])) ? $input['password_confirmation'] 	: false
					,'email' 					=> (isset($input['email'])) 				? $input['email'] 					: ''
					,'first_name' 				=> (isset($input['first_name'])) 			? $input['first_name'] 				: null
					,'last_name' 				=> (isset($input['last_name'])) 			? $input['last_name'] 				: null
					,'birthdate' 				=> (isset($input['birthdate'])) 			? $input['birthdate'] 				: null
					,'address_street' 			=> (isset($input['address_street'])) 		? $input['address_street'] 			: null
					,'address_suburb' 			=> (isset($input['address_suburb'])) 		? $input['address_suburb'] 			: null
					,'address_state' 			=> (isset($input['address_state'])) 		? $input['address_state'] 			: null
					,'address_zip' 				=> (isset($input['address_zip'])) 			? $input['address_zip'] 			: null
					,'country' 					=> (isset($input['country'])) 				? $input['country'] 				: null
					,'phone' 					=> (isset($input['phone'])) 				? $input['phone'] 					: null
				);
		$validation_rules = array(
					 'id' 							=> 'required'
					,'role_id' 						=> 'required'
					,'username' 					=> (isset($input['username']) && $input['username'] == $user->username) ? 'required' 				: 'required|unique:users'
					,'password' 					=> (isset($data['password']) && $data['password'] != '') 				? 'required|confirmed' 		: ''
					,'password_confirmation' 		=> (isset($data['password']) && $data['password'] != '') 				? 'required' 				: ''
					,'email' 						=> (isset($input['email']) && $input['email'] == $user->email) 			? 'required|email' 			: 'required|email|unique:users'
					,'first_name' 					=> ''
					,'last_name' 					=> ''
					,'birthdate' 					=> ''
					,'address_street' 				=> ''
					,'address_suburb' 				=> ''
					,'address_state' 				=> ''
					,'address_zip' 					=> ''
					,'country' 						=> ''
					,'phone' 						=> ''
				);
		$validation_messages = array(
					 'id.required' 						=> 'User id is required'
					,'role_id.required' 				=> 'User role is required'
					,'username.required' 				=> 'Username is required'
					,'username.unique' 					=> 'Username has been taken'
					,'password.required' 				=> 'Password is required'
					,'password_confirmation.confirmed' 	=> 'Password did not matched '
					,'password_confirmation.required' 	=> 'Re-type password'
					,'email.required' 					=> 'Email address is required'
					,'email.unique' 					=> 'Email address has been taken'
					,'email.email' 						=> 'Email must be a valid email address'
				);

		$validator = Validator::make($data,$validation_rules,$validation_messages);

		if($validator->passes()){
				$newUser = $this->user_model->edit($data);
				if($newUser)
					echo json_encode(array('success' => true,'data' => $newUser));
				else
					echo json_encode(array('success' => false,'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			echo json_encode(array('success' => false,'error_message' => $error_messages));
		}
	}

	public function destroy($id)
	{
		return Response::json(array('success'=>User::where('id',$id)->delete()));
	}
}