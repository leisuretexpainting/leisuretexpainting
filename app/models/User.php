<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

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
		$user->address 			= (isset($data['address']) && !empty($data['address']))					? $data['address'] 								: null;
		$user->city 			= (isset($data['city']) && !empty($data['city']))						? $data['city'] 								: null;
		$user->state 			= (isset($data['state']) && !empty($data['state']))						? $data['state'] 								: null;
		$user->zip_code 		= (isset($data['zip_code']) && !empty($data['zip_code']))				? $data['zip_code'] 							: null;
		$user->country_code 	= (isset($data['country_code']) && !empty($data['country_code']))		? $data['country_code'] 						: null;
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
			$user->address 			= (isset($data['address']) && !empty($data['address']))					? $data['address'] 								: $user->address;
			$user->city 			= (isset($data['city']) && !empty($data['city']))						? $data['city'] 								: $user->city;
			$user->state 			= (isset($data['state']) && !empty($data['state']))						? $data['state'] 								: $user->state;
			$user->zip_code 		= (isset($data['zip_code']) && !empty($data['zip_code']))				? $data['zip_code'] 							: $user->zip_code;
			$user->country_code 	= (isset($data['country_code']) && !empty($data['country_code']))		? $data['country_code'] 						: $user->country_code;
			$user->phone 			= (isset($data['phone']) && !empty($data['phone'])) 					? $data['phone'] 								: $user->phone;
			if($user->save())
				return $user;
			else
				return false;
		}else
			return false;
		
	}

	/*Scopes*/

	/*Relationships*/
	public function role(){
		return $this->hasOne('Role','id','role_id');
	}
}
