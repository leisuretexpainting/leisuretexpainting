<?php
class AdminController extends BaseController {
	
	public function dashboard()
	{
		return View::make('admin/dashboard');
	}

	public function showAdminLogin(){
		return View::make('admin/login');
	}

	public function login(){
		
		$login_data = Input::get();
        $validator 	= Validator::make($login_data,array('username' => 'required','password' => 'required'));

        if($validator->passes()){
            
            $username 		= $login_data['username'];
            $password 		= $login_data['password'];
            $remember_me 	= (isset($login_data['remember_me'])) ? true : false;

            if (Auth::attempt(array('username' => $username, 'password' => $password, 'role_id' => 1),$remember_me)){
            	echo json_encode(array('success' => true));
            }else{
                $error_message = 'Incorrect username or password';
                echo json_encode(array('success'=>false,'error_message'=>$error_message));
            }
        }else{
            $error_message = 'Username and password are required';
            echo json_encode(array('success'=>false,'error_message'=>$error_message));
        }
        
	}

	/**
	 * Logout user account.
	 *
	 * @return Response
	 */
	public function logout(){
        Auth::logout();
        return Redirect::to('admin/login');
    }
}