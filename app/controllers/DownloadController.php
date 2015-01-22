<?php
class DownloadController extends BaseController {

	private $base_url;
	private $base_path;
    private $zipper;

	public function __construct()
	{
		$this->base_path 	= public_path().'/uploads';
		$this->base_url 	= URL::to('/uploads/');
        $this->zipper       = new \Chumper\Zipper\Zipper;
	}

    public function download($path = null,$file_name = null)
    {
    	/*create tmp directory if not exists*/
        $base_temp_path        = public_path().'/tmp';
        if(!File::exists($base_temp_path)) { File::makeDirectory($base_temp_path,0777); }

    	$input 			       = Input::get();
    	$id                    = (isset($input['id']) && $input['id'] != '') ? $input['id'] : null;
        $downloadable_files    = array();

    	switch ($path) {
            /*===================================================================================================
            | TENDER DOCUMENT DOWNLOAD SCRIPT START
            /*===================================================================================================*/
    		case 'tenderdocuments':

                $temp_download_path = $base_temp_path.'/tenderdocuments';
                /*create tmp/tenderdocuments directory if not exists*/
                if(!File::exists($temp_download_path)) { File::makeDirectory($temp_download_path,0777); }
                /*Multiple / Group Download*/
    			if($file_name == null && $tender = Tender::find($id)){

                        $documents  = $tender->documents()->get();
                        $target_dir = $temp_download_path.'/'.$tender->id;
                        /*create a new directory for download*/
                        File::deleteDirectory($target_dir);
                        File::makeDirectory($target_dir,0777);

                        foreach($documents as $document){
                            $source_file = $document->path->main;
                            $target_file = $target_dir.'/'.$document->text;
                            /*copy and rename source file with the original file name into the download directory*/
                            File::copy($source_file,$target_file);
                            $downloadable_files[] = $target_file;
                        }
                        /*start compressing download directory*/
                        $target_compressed_file = $target_dir.'/tenderdocuments_'.$tender->id.'.zip';
                        $this->zipper->make($target_compressed_file)->add($downloadable_files);
                        $this->zipper->close();    				    

                        App::finish(function($request, $response) use($target_dir){
                            /*after download: remove the created temporary download directory*/
                            File::deleteDirectory($target_dir);
                        });
                        ob_end_clean();
                        return Response::download($target_compressed_file,null,array('content-type' => 'application/zip'));
    			}
                /*Single file download*/
                else{
                    $source_file = $this->base_path.'/tenderdocuments/'.$file_name;
                    if(File::exists($source_file)){
                        $document       = TenderDocument::where('name',$file_name)->first();
                        $target_file    = $temp_download_path.'/'.$document->text;
                        File::copy($source_file,$target_file);

                        App::finish(function($request, $response) use($target_file){
                            /*after download: remove the created temporary file directory*/
                            File::delete($target_file);
                        });

                        ob_end_clean();
                        return Response::download($target_file,null,array('content-type' => 'application/zip'));
                    }
                    return false;
                }

    			break;
    		/*===================================================================================================
            | TENDER DOCUMENT DOWNLOAD SCRIPT END
            /*===================================================================================================*/
    		default:
    			# code...
    			break;
    	}
	}

}