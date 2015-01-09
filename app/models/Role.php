<?php

class Role extends Eloquent {
	
	protected $table = 'roles';

	public function getDetails($id){
		$userRole = Role::find($id);
		return ($userRole) ? $userRole : false;
	}

	public function getAll(){
		return Role::all();
	}

	public function store($data = array()){
		$userRole = new Role;
		$userRole->title 		= $data['title'];
		$userRole->is_active 	= (isset($data['is_active'])) ? $data['is_active'] : 1;
		if($userRole->save())
			return $userRole;
		else
			return false;
	}

	public function edit($data = array()){
		$userRoleId = $data['id'];
		$userRole 	= Role::find($userRoleId);

		if($userRole){
			$userRole->title 		= (isset($data['title'])) 		? $data['title'] 		: $userRole->title;
			$userRole->is_active 	= (isset($data['is_active'])) 	? $data['is_active'] 	: $userRole->is_active;
			if($userRole->save())
				return $userRole;
			else
				return false;
		}else{
			return false;
		}

	}

	public function remove($id){
		
	}

}