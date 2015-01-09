<?php
class AdminTenderController extends BaseController {
	
	public function index()
	{
		return View::make('admin/tender_list');
	}

	public function create()
	{
		return View::make('admin/tender_create');
	}

	public function store()
	{

	}

	public function show($id)
	{
		return View::make('admin/tender_details');
	}

	public function edit($id)
	{
		return View::make('admin/tender_edit');
	}

	public function update($id)
	{
		
	}

	public function destroy($id)
	{
		
	}
}