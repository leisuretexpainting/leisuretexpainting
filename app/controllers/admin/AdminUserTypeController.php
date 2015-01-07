<?php
class AdminUserTypeController extends BaseController {
	
	public function index()
	{
		return View::make('admin/user_type_list');
	}

	public function create()
	{
		return View::make('admin/user_type_create');
	}

	public function store()
	{

	}

	public function show($id)
	{
		return View::make('admin/user_type_details');
	}

	public function edit($id)
	{
		return View::make('admin/user_type_edit');
	}

	public function update($id)
	{
		
	}

	public function destroy($id)
	{
		
	}
}