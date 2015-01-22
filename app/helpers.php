<?php

function printpre($q){
	echo "<pre>";print_r($q);echo "</pre>";
}

function getUploadedFileLinks($directory,$file_name){
    $base_url       = url("/uploads/{$directory}");
    $base_path      = public_path()."/uploads/{$directory}";
    $file_url      = new stdClass;

    if($directory != '' && file_exists($base_path.'/'.$file_name)){
            $file_url->main         = $base_url.'/'.$file_name;
            if(file_exists($base_path.'/thumbnail/'.$file_name)){
            	$file_url->thumbnail    = $base_url.'/thumbnail/'.$file_name;
            }
            return $file_url;
    }else{
    	return false;
    }
}

function getUploadedFilePaths($directory,$file_name){
    $base_url       = url("/uploads/{$directory}");
    $base_path      = public_path()."/uploads/{$directory}";
    $file_path      = new stdClass;

    if($directory != '' && file_exists($base_path.'/'.$file_name)){
            $file_path->main         = $base_path.'/'.$file_name;
            if(file_exists($base_path.'/thumbnail/'.$file_name)){
            	$file_path->thumbnail    = $base_path.'/thumbnail/'.$file_name;
            }
            return $file_path;
    }else{
    	return false;
    }
}