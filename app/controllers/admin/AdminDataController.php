<?php
class AdminDataController extends BaseController {

	public function index($name){
		$this->$name();
	}

	public function users(){
		$input 			= Input::get();
		$user_id 		= (isset($input['id']) && !empty($input['id'])) ? $input['id'] : '';
		$role 			= (isset($input['role']) && !empty($input['role'])) ? $input['role'] : '';

		$result = User::all();

		if($user_id != ''){
			$this->returnJSON(User::find($user_id));
		}

		if($role != ''){
			switch ($role) {
				case 'administrator':
					$result = User::where('role_id',1)->get();
					break;
				case 'sales':
					$result = User::where('role_id',2)->get();
					break;
				case 'operations':
					$result = User::where('role_id',3)->get();
					break;
				case 'senior_estimator':
					$result = User::where('role_id',4)->get();
					break;
				case 'estimator':
					$result = User::where('role_id',5)->get();
					break;
				case 'supervisor':
					$result = User::where('role_id',6)->get();
					break;
				case 'staff':
					$result = User::where('role_id',7)->get();
					break;
				case 'constractor':
					$result = User::where('role_id',8)->get();
					break;
				default:
					# code...
					break;
			}
		}
		$this->returnJSON($result);
	}

	public function contractors()
	{
		$this->returnJSON(Contractor::with('owner')->get());
	}

	public function contacts(){
		$input 			= Input::get();
		$contact_id 	= (isset($input['id']) && !empty($input['id'])) ? $input['id'] : '';
		$contractor_id 	= (isset($input['contractor_id']) && !empty($input['contractor_id'])) ? $input['contractor_id'] : '';
		
		/*Get all contact details*/
		$result = Contact::all(); 
		/*Get contact details for specific contractor*/
		if($contractor_id != ''){
			
			$result = Contact::where('contractor_id',$contractor_id)->get();

			/*Get contact details group by grade for specific contractor*/
			if($result != false && isset($input['group_by']) && $input['group_by'] == 'grade'){
				$contact_by_group = array();
				foreach($result as $contact){
					if(!isset($contact_by_group[$contact->grade])) { $contact_by_group[$contact->grade] = array(); }
					$contact_by_group[$contact->grade][] = $contact;
				}
				$result = $contact_by_group;
			}
		}
		/*Get specific contact details*/
		if($contact_id != ''){
			$result = Contact::find($contact_id);
		}

		$this->returnJSON($result);
	}

	public function returnJSON($array){
		echo json_encode($array);
	}
}