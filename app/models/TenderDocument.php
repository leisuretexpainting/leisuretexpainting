<?php

class TenderDocument extends Eloquent {
	
	protected $table 	= 'tender_documents';
	protected $hidden 	= array('created_at','updated_at');
	protected $fillable = array('name','text','note');
	protected $appends 	= array('url','path','is_image');

	public function getUrlAttribute(){
		return $this->attributes['url'] = getUploadedFileLinks('tenderdocuments',$this->name);
	}

	public function getPathAttribute(){
		return $this->attributes['path'] = getUploadedFilePaths('tenderdocuments',$this->name);
	}

	public function getIsImageAttribute(){
		return $this->attributes['is_image'] = (file_exists(public_path().'/uploads/tenderdocuments/thumbnail/'.$this->name)) ? true : false;
	}

}