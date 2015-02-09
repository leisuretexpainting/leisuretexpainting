<?php

class Project extends Eloquent {
	
	protected $table = 'projects';

	public function type(){
		return $this->belongsTo('ProjectType');
	}

}