<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table 	= 'users';
	protected $hidden 	= array('password','remember_token');
	protected $appends 	= array('name','is_admin');

	/*Methods*/
	public function getAll(){
		return User::with('role')->get();
	}

	public function getDetails($id){
		return User::with('role')->find($id);
	}

	public function store($data = array()){
		$user = new User;
		$user->role_id 			= $data['role_id'];
		$user->username 		= $data['username'];
		$user->password 		= (Hash::needsRehash($data['password'])) ? Hash::make($data['password']) : $data['password'];
		$user->email 			= $data['email'];
		$user->first_name 		= (isset($data['first_name']) && !empty($data['first_name'])) 			? $data['first_name'] 							: null;
		$user->last_name 		= (isset($data['last_name']) && !empty($data['last_name'])) 			? $data['last_name'] 							: null;
		$user->birthdate 		= (isset($data['birthdate']) && !empty($data['birthdate'])) 			? date('Y-m-d',strtotime($data['birthdate'])) 	: null;
		$user->address_street 	= (isset($data['address_street']) && !empty($data['address_street']))	? $data['address_street'] 						: null;
		$user->address_suburb 	= (isset($data['address_suburb']) && !empty($data['address_suburb']))	? $data['address_suburb'] 						: null;
		$user->address_state 	= (isset($data['address_state']) && !empty($data['address_state']))		? $data['address_state'] 						: null;
		$user->address_zip 		= (isset($data['address_zip']) && !empty($data['address_zip']))			? $data['address_zip'] 							: null;
		$user->country 			= (isset($data['country']) && !empty($data['country']))					? $data['country'] 								: null;
		$user->phone 			= (isset($data['phone']) && !empty($data['phone'])) 					? $data['phone'] 								: null;
		if($user->save())
			return $user;
		else
			return false;
	}

	public function edit($data = array()){
		$user_id 	= $data['id'];
		$user 		= User::find($user_id);

		if($user){
			$user->role_id 			= (isset($data['role_id']) && !empty($data['role_id'])) 				? $data['role_id'] 								: $user->role_id;
			$user->username 		= (isset($data['username']) && !empty($data['username'])) 				? $data['username'] 							: $user->username;
			$user->password 		= (isset($data['password']) && !empty($data['password'])) 				? Hash::make($data['password'])					: $user->password;
			$user->email 			= (isset($data['email']) && !empty($data['email'])) 					? $data['email'] 								: $user->email;
			$user->first_name 		= (isset($data['first_name']) && !empty($data['first_name'])) 			? $data['first_name'] 							: $user->first_name;
			$user->last_name 		= (isset($data['last_name']) && !empty($data['last_name'])) 			? $data['last_name'] 							: $user->last_name;
			$user->birthdate 		= (isset($data['birthdate']) && !empty($data['birthdate'])) 			? date('Y-m-d',strtotime($data['birthdate'])) 	: $user->birthdate;
			$user->address_street 	= (isset($data['address_street']) && !empty($data['address_street']))	? $data['address_street'] 						: $user->address_street;
			$user->address_suburb 	= (isset($data['address_suburb']) && !empty($data['address_suburb']))	? $data['address_suburb'] 						: $user->address_suburb;
			$user->address_state 	= (isset($data['address_state']) && !empty($data['address_state']))		? $data['address_state'] 						: $user->address_state;
			$user->address_zip 		= (isset($data['address_zip']) && !empty($data['address_zip']))			? $data['address_zip'] 							: $user->address_zip;
			$user->country 			= (isset($data['country']) && !empty($data['country']))					? $data['country'] 								: $user->country;
			$user->phone 			= (isset($data['phone']) && !empty($data['phone'])) 					? $data['phone'] 								: $user->phone;
			if($user->save())
				return $user;
			else
				return false;
		}else
			return false;
		
	}

	/*Accessors*/
	public function getIsAdminAttribute(){
		return $this->attributes['is_admin'] = ($this->role_id == 1) ? true : false;
	}
	public function getNameAttribute(){
		return $this->attributes['name'] = $this->first_name.' '.$this->last_name;
	}

	/*Query Scopes*/
	public function scopeAdministrator($query){
		return $query->where('role_id',1);
	}
	public function scopeSales($query){
		return $query->where('role_id',2);
	}
	public function scopeContractor($query){
		return $query->where('role_id',8);
	}

	/*Relationships*/
	public function role(){
		return $this->hasOne('Role','id','role_id');
	}
	public function history(){
		return $this->morphMany('History','historable');
	}
}
