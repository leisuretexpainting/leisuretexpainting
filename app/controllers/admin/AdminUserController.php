<?php
class AdminUserController extends BaseController {
	
	public function index()
	{
		return View::make('admin/user_list');
	}

	public function create()
	{
		return View::make('admin/user_create');
	}

	public function store()
	{

	}

	public function show($id)
	{
		return View::make('admin/user_details');
	}

	public function edit($id)
	{
		return View::make('admin/user_edit');
	}

	public function update($id)
	{
		
	}

	public function destroy($id)
	{
		
	}
}