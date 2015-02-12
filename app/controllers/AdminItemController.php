<?php

class AdminItemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$data = array(
				 'name' 		=> 'Item F'
				,'description' 	=> 'sample description'
				,'prices' 		=> array(
									  'BB'		=> 100
									 ,'BW'		=> 100
									 ,'FC'		=> 100
									 ,'OFC'		=> 100
									 ,'PB'		=> 100
									 ,'PBMR'	=> 100
									 ,'S'		=> 100
									 ,'T'		=> 100
								)
			);
		$result = $this->item_model->store($data);
		$result = $this->item_model->edit($data);
		printpre($result);
		*/
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = Item::with('prices','category')->where('id',$id)->first()->toArray();
    	printpre($item);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
