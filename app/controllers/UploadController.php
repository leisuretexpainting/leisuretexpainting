<?php
class UploadController extends BaseController {

	private $base_url;
	private $upload_path;
	private $script_url;
	private $options;

	public function __construct()
	{
		$this->base_url 	= URL::to('/');
		$this->upload_path 	= public_path().'/uploads/';
		$this->upload_url 	= $this->base_url.'/uploads/';
		$this->script_url   = $this->base_url.'/upload/';
		$this->options 		= array('file_name' => uniqid());
	}

    public function upload($resource = null)
    {
    	switch ($resource) {
    		case 'tenderdocuments':
    			$options = array(
		    		 'upload_dir' 	=> $this->upload_path.'tenderdocuments/'
		    		,'upload_url' 	=> $this->upload_url.'tenderdocuments/'
		    		,'script_url' 	=> $this->script_url.'tenderdocuments/'		    		
		    	);
    			break;
    		default:
    			# code...
    			break;
    	}
    	$this->options 	= array_merge($this->options,$options);
		$upload 		= new UploadHandler($this->options);
	}

	public function delete($resource = null){
		$input 	= Input::get();
		$file 	= $input['file'];
		if($resource == 'tenderdocuments' && $file != '')
			TenderDocument::where('name',$file)->delete();

		$this->upload($resource);
	}
}