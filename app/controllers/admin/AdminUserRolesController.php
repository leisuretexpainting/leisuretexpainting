<?php
class AdminUserRolesController extends BaseController {
	
	public function index()
	{
		$this->data['userRoles'] = $this->role_model->getAll();
		return View::make('admin.role.index',$this->data);
	}

	public function create()
	{
		return View::make('admin.role.create');
	}

	public function store()
	{
		$input 					= Input::get();
		$data 					= array(
									 'title' 			=> $input['title']
									,'is_active'		=> (isset($input['is_active'])) ? $input['is_active'] : 1
								);
		$validation_rules 		= array(
									  'title' 			=> 'required|unique:roles'
									 ,'is_active' 		=> 'required'
								);
		$validation_messages 	= array(
									 'title.required' 	=> 'Role title is required'
									,'title.unique' 	=> 'Role title is already available'
								);
		$validator 				= Validator::make($data,$validation_rules,$validation_messages);

		if($validator->passes()){
				$newUserRole = $this->role_model->store($data);
				if($newUserRole)
					echo json_encode(array('success' => true, 'data' => $newUserRole));
				else
					echo json_encode(array('success' => false, 'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			echo json_encode(array('success' => false, 'error_message' => $error_messages));
		}
	}

	public function show($id)
	{
		$userRole = $this->role_model->getDetails($id);
		echo ($userRole) ? json_encode(array('success'=>true,'data'=>$userRole)) : json_encode(array('success'=>false));
	}

	public function edit($id)
	{
		$this->data['userRole'] = $this->role_model->getDetails($id);
		return View::make('admin.role.edit',$this->data);
	}

	public function update($id)
	{
		$input 					= Input::get();
		$userRole 				= $this->role_model->getDetails($id);

		$data 					= array(
									 'id' 				=> $input['role_id']
									,'title' 			=> $input['title']
									,'is_active'		=> $input['is_active']
								);
		$validation_rules 		= array(
									  'title' 			=> (!empty($data['title']) && $userRole->title != $data['title']) ? 'required|unique:roles' : 'required'
									 ,'is_active' 		=> 'required'
								);
		$validation_messages 	= array(
									 'title.required' 	=> 'Role title is required'
									,'title.unique' 	=> 'Role title is already available'
								);
		$validator 				= Validator::make($data,$validation_rules,$validation_messages);

		if($validator->passes()){
				$updatedUserRole = $this->role_model->edit($data);
				if($updatedUserRole)
					echo json_encode(array('success' => true, 'data' => $updatedUserRole));
				else
					echo json_encode(array('success' => false, 'error_message' => 'Something went wrong'));
		}else{
			$messages 		= $validator->messages();
			$error_messages = array();
			foreach($validation_rules as $key=>$rule){
				if($rule != '' && $messages->has($key)){
					$error_messages[$key] = $messages->first($key);
				}
			}
			echo json_encode(array('success' => false, 'error_message' => $error_messages));
		}
	}

	public function destroy($id)
	{
		$result = $this->role_model->remove($id);
		echo json_encode(array('success'=>$result));
	}
}