<?php

class Job extends Eloquent {
	
	protected $table = 'jobs';

	public function type(){
		return $this->belongsTo('JobType');
	}

}