<?php

class Tender extends Eloquent {
	
	protected $table = 'tenders';

	public function getDetailsById($id){
		return Tender::with('contractor','contact','project','sales','documents')->where('id',$id)->first();
	}

	public function getAllDetails(){
		return Tender::with('contractor','contact','project','sales','documents')->get();
	}

	public function store($data){

		$contractor_id 	= (isset($data['contractor_id']) && $data['contractor_id'] != '') 	? $data['contractor_id'] 	: null;
		$contact_id		= (isset($data['contact_id']) && $data['contact_id'] != '') 		? $data['contact_id'] 		: null;
		
		$contractor = ($contractor_id != null) 	? Contractor::find($contractor_id) 	: new Contractor();
		$contact 	= ($contact_id != null)		? Contact::find($contact_id) 		: new Contact();
		$project 		= new Project();
		$tender 	= new Tender();
				
		$contractor->name 						= $data['contractor_name'];
		$contractor->business_address_street 	= $data['contractor_business_address_street'];
		$contractor->business_address_suburb 	= $data['contractor_business_address_suburb'];
		$contractor->business_address_state 	= $data['contractor_business_address_state'];
		$contractor->business_address_zip 		= $data['contractor_business_address_zip'];
		$contractor->postal_address_street 		= $data['contractor_postal_address_street'];
		$contractor->postal_address_suburb 		= $data['contractor_postal_address_suburb'];
		$contractor->postal_address_state 		= $data['contractor_postal_address_state'];
		$contractor->postal_address_zip 		= $data['contractor_postal_address_zip'];
		$contractor->abn 						= $data['contractor_abn'];
		$contractor->save();

		
		$contact->contractor_id					= $contractor->id;
		$contact->name 							= $data['contact_name'];
		$contact->email 						= $data['contact_email'];
		$contact->phone 						= $data['contact_phone'];
		$contact->grade 						= $data['contact_grade'];
		$contact->save();

		$project->due_date 							= $data['project_due_date'];
		$project->name 								= $data['project_name'];
		$project->type 								= $data['project_type_id'];
		$project->address_zip 						= $data['project_address_zip'];
		$project->address_suburb 					= $data['project_address_suburb'];
		$project->address_state 					= $data['project_address_state'];
		$project->address_zip 						= $data['project_address_zip'];
		$project->save();
	
		$tender->contractor_id 	= $contractor->id;
		$tender->contact_id 	= $contact->id;
		$tender->sales_id 		= $data['project_sales_id'];
		$tender->project_id 	= $project->id;
		if($tender->save()){
			/*save related documents if available*/
			$uploaded_documents 	= array();
			foreach($data['uploaded_documents'] as $document){
				$uploaded_documents[] = new TenderDocument(array('name'=>$document['name'],'text'=>$document['text'],'note'=>$document['note']));
			}
			$tender->documents()->saveMany($uploaded_documents);

			return $this->getDetailsById($tender->id);
		}else
			return false;
	}

	public function edit($data){
		$tender_id 		= $data['tender_id'];
		$contractor_id 	= (isset($data['contractor_id']) && $data['contractor_id'] != '') 	? $data['contractor_id'] 	: null;
		$contact_id		= (isset($data['contact_id']) && $data['contact_id'] != '') 		? $data['contact_id'] 		: null;
		
		$contractor = ($contractor_id != null) 	? Contractor::find($contractor_id) 	: new Contractor();
		$contact 	= ($contact_id != null)		? Contact::find($contact_id) 		: new Contact();
		$tender 	= Tender::find($tender_id);
				
		$contractor->name 						= $data['contractor_name'];
		$contractor->business_address_street 	= $data['contractor_business_address_street'];
		$contractor->business_address_suburb 	= $data['contractor_business_address_suburb'];
		$contractor->business_address_state 	= $data['contractor_business_address_state'];
		$contractor->business_address_zip 		= $data['contractor_business_address_zip'];
		$contractor->postal_address_street 		= $data['contractor_postal_address_street'];
		$contractor->postal_address_suburb 		= $data['contractor_postal_address_suburb'];
		$contractor->postal_address_state 		= $data['contractor_postal_address_state'];
		$contractor->postal_address_zip 		= $data['contractor_postal_address_zip'];
		$contractor->abn 						= $data['contractor_abn'];
		$contractor->save();

		
		$contact->contractor_id					= $contractor->id;
		$contact->name 							= $data['contact_name'];
		$contact->email 						= $data['contact_email'];
		$contact->phone 						= $data['contact_phone'];
		$contact->grade 						= $data['contact_grade'];

		$tender->project->due_date 							= $data['project_due_date'];
		$tender->project->name 								= $data['project_name'];
		$tender->project->type 								= $data['project_type_id'];
		$tender->project->address_zip 						= $data['project_address_zip'];
		$tender->project->address_suburb 					= $data['project_address_suburb'];
		$tender->project->address_state 					= $data['project_address_state'];
		$tender->project->address_zip 						= $data['project_address_zip'];
		$tender->project->save();
		
		$tender->status 		= $data['tender_status'];	
		$tender->contractor_id 	= $contractor->id;
		$tender->contact_id 	= $contact->id;
		$tender->sales_id 		= $data['project_sales_id'];
		$tender->project_id 		= $tender->project->id;
		if($tender->save()){
			/*save related documents if available*/
			if(isset($data['uploaded_documents']) && is_array($data['uploaded_documents'])){
				$uploaded_documents 	= array();
				TenderDocument::where('tender_id',$tender->id)->delete();
				foreach($data['uploaded_documents'] as $document){
					$uploaded_documents[] = new TenderDocument(array('name'=>$document['name'],'text'=>$document['text'],'note'=>$document['note']));
				}
				$tender->documents()->saveMany($uploaded_documents);
			}

			return $this->getDetailsById($tender->id);
		}else
			return false;
	}

	public function contractor(){
		return $this->belongsTo('Contractor');
	}
	public function contact(){
		return $this->belongsTo('Contact');
	}
	public function project(){
		return $this->belongsTo('Project');
	}
	public function sales(){
		return $this->belongsTo('User','sales_id','id');
	}
	public function documents(){
		return $this->hasMany('TenderDocument','tender_id');
	}
	public function tenderStatus(){
		return $this->belongsTo('TenderStatus','status','code');
	}
}