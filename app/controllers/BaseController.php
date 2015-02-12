<?php

class BaseController extends Controller {

	public 		$data = array();
	protected 	$user_model;
	protected 	$userType_model;
	protected 	$role_model;
	
	public function __construct(){
		$this->user_model 		= new User();
		$this->role_model 		= new Role();
		$this->tender_model		= new Tender();
		$this->contractor_model	= new Contractor();
		$this->contact_model	= new Contact();
		$this->item_model		= new Item();
		$this->quotation_model	= new Quotation();
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
