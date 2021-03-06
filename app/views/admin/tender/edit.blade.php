@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Tender Details</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-file"></i> Tenders</a></li>
            <li><a href="/admin/tenders/">Manage tender details</a></li>
            <li class="active">Update tender details</li>
        </ol>
    </div>
</div>
<div class="row">
<form id="form-update-tender">
	<input type="hidden" id="tender_id" name="tender_id" value="{{$tender->id}}"/>
	<input type="hidden" id="new_contractor" name="new_contractor" value="0"/>
	<input type="hidden" id="new_contact" name="new_contact" value="0"/>
    <div class="alert alert-success alert-dismissable" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Success!</strong> Tender Details has been updated
    </div>
    <div class="col-lg-10">
		<div class="panel panel-primary">
        	<div class="panel-heading">Project Details&nbsp;</div>
        	<div class="panel-body">
	            <div class="table-responsive">
	                <table class="table">
	                	<tr>
		                    <td style="width:vertical-align:middle;"><label>Status</label></td>
		                    <td>
								<div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="tender_status"></label>
		                            <select id="tender_status" name="tender_status" class="form-control">
		                            	@foreach($tender_status as $status)
	                            		<option value="{{$status->code}}"  {{($tender->status == $status->id) ? 'selected' : ''}}>{{$status->text}}</option>
	                            		@endforeach
		                            </select>
		                        </div>
		                    </td>
		                </tr>
	                	<tr>
		                    <td style="vertical-align:middle;width:15%"><label>Due Date</label></td>
		                    <td>
		                    	<div class="form-group" style="margin:0px;width:40%">
		                    		<label style="display:none;" class="control-label" for="project_due_date"></label>
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <i class="fa fa-calendar"></i>
		                                </div>
		                                <input id="project_due_date" name="project_due_date" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" placeholder="mm/dd/yyyy" value="{{$tender->project->due_date}}">
		                            </div>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Sales Representative</label></td>
		                    <td>
								<div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="project_sales_id"></label>
		                            <select id="project_sales_id" name="project_sales_id" class="form-control">
		                            	@foreach($sales_representatives as $sales)
	                            		<option value="{{$sales->id}}"  {{($tender->sales->id == $sales->id) ? 'selected' : ''}}>{{$sales->name}}</option>
	                            		@endforeach
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Project Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:91%;">
		                            <label style="display:none;" class="control-label" for="project_name"></label>
		                            <input id="project_name" name="project_name" class="form-control" style="text-align:left;" placeholder="project name (required)" value="{{$tender->project->name}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Project Type</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="project_type_id"></label>
		                            <select id="project_type_id" name="project_type_id" class="form-control">
		                            	<option value="">Select Project Type</option>
		                            	@foreach($project_types as $project_type)
		                            	<option value="{{$project_type->id}}" {{($tender->project->type == $project_type->id) ? 'selected' : '' }}>{{$project_type->name}}</option>
		                            	@endforeach
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Project Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="project_address_street"></label>
		                            <input id="project_address_street" name="project_address_street" class="form-control" placeholder="street" style="width:100%;" value="{{$tender->project->address_street}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="project_address_suburb"></label>
		                            <input id="project_address_suburb" name="project_address_suburb" class="form-control" placeholder="suburb" style="width:100%;" value="{{$tender->project->address_suburb}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="project_address_state"></label>
		                            <input id="project_address_state" name="project_address_state" class="form-control" placeholder="state" style="width:100%;" value="{{$tender->project->address_state}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="project_address_zip"></label>
		                            <input id="project_address_zip" name="project_address_zip" class="form-control" placeholder="zip code" style="width:100%;" value="{{$tender->project->address_zip}}"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
	                </table>
	            </div>
        	</div>
    	</div>
	</div>
	<div class="col-lg-10">
		<div class="panel panel-primary">
        	<div class="panel-heading">Contractor Details&nbsp;</div>
        	<div class="panel-body">
	            <div class="table-responsive">
	                <table class="table">
		                <tr>
		                    <td style="vertical-align:middle;width:15%"><label>Contractor</label></td>
		                    <td>
		                    	<input type="hidden" id="contractor_id" name="contractor_id" value="{{$tender->contractor->id}}"/>
		                        <div class="form-group" style="margin:0px;">
		                        	<label style="display:none;" class="control-label" for="contractor_name"></label>
		                        	<div class="pull-left" style="width:40%;">
		                            	<input id="contractor_name" name="contractor_name" class="typeahead form-control pull-left" autocomplete="off" style="text-align:left;" placeholder="search contractor name" value="{{$tender->contractor->name}}"/>
		                            </div>
		                            <div class="pull-left" style="margin-left:10px;">
		                        		<button id="edit-contractor-details" type="button" class="btn btn-sm btn-primary" title="Edit Contractor Details" style="display:none;"><i class="fa fa-edit"></i> Edit Details</button>
		                        		<button id="save-contractor-details" type="button" class="btn btn-sm btn-primary" title="Save Contractor Details" style="display:none;"><i class="fa fa-save"></i> Save Details</button>
		                        		<button id="cancel-contractor-details" type="button" class="btn btn-sm btn-primary" title="Cancel Editing Contractor Details" style="display:none;"><i class="fa fa-undo"></i> Cancel</button>
		                        		<button id="add-new-contractor" type="button" class="btn btn-sm btn-primary" title="New Contractor"><i class="fa fa-plus"></i> New Contractor</button>
		                        		<button id="search-contractor-details" type="button" class="btn btn-sm btn-primary" title="Search Contractor" style="display:none;"><i class="fa fa-search"></i> Search Existing Contractor</button>
		                        	</div>
		                        	<div style="clear:both;"></div>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Business Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="contractor_business_address_street"></label>
		                            <input id="contractor_business_address_street" name="contractor_business_address_street" class="form-control" placeholder="street" style="width:100%;" readonly value="{{$tender->contractor->business_address_street}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_business_address_suburb"></label>
		                            <input id="contractor_business_address_suburb" name="contractor_business_address_suburb" class="form-control" placeholder="suburb" style="width:100%;" readonly value="{{$tender->contractor->business_address_suburb}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_business_address_state"></label>
		                            <input id="contractor_business_address_state" name="contractor_business_address_state" class="form-control" placeholder="state" style="width:100%;" readonly value="{{$tender->contractor->business_address_state}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_business_address_zip"></label>
		                            <input id="contractor_business_address_zip" name="contractor_business_address_zip" class="form-control" placeholder="zip code" style="width:100%;" readonly value="{{$tender->contractor->business_address_zip}}"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Postal Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="contractor_postal_address_street"></label>
		                            <input id="contractor_postal_address_street" name="contractor_postal_address_street" class="form-control" placeholder="street" style="width:100%;" readonly value="{{$tender->contractor->postal_address_street}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_postal_address_suburb"></label>
		                            <input id="contractor_postal_address_suburb" name="contractor_postal_address_suburb" class="form-control" placeholder="suburb" style="width:100%;" readonly value="{{$tender->contractor->postal_address_suburb}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_postal_address_state"></label>
		                            <input id="contractor_postal_address_state" name="contractor_postal_address_state" class="form-control" placeholder="state" style="width:100%;" readonly value="{{$tender->contractor->postal_address_state}}"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contractor_postal_address_zip"></label>
		                            <input id="contractor_postal_address_zip" name="contractor_postal_address_zip" class="form-control" placeholder="zip code" style="width:100%;" readonly value="{{$tender->contractor->postal_address_zip}}"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>ABN</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contractor_abn"></label>
		                            <input id="contractor_abn" name="contractor_abn" class="form-control" style="text-align:left;" placeholder="australian business number" readonly value="{{$tender->contractor->abn}}"/>
		                        </div>
		                    </td>
		                </tr>
	                </table>
	            </div>
        	</div>
    	</div>
	</div>

	<div class="col-lg-10">
		<div class="panel panel-primary">
        	<div class="panel-heading">Contact Details&nbsp;</div>
        	<div class="panel-body">
	            <div>
	                <table id="table-select-contact-details" class="table">
	                	<tr>
	                		<td style="vertical-align:middle;width:15%"><label>Select Contact</label></td>
	                		<td>
		                        <input type="hidden" id="contact_grade" name="contact_grade" value="{{$tender->contact->grade}}"/>
	                			<input type="hidden" id="contact_name" name="contact_name" value="{{$tender->contact->name}}"/>
		                        <div class="form-group" style="margin:0px;">
		                        	<label style="display:none;" class="control-label" for="contact_id"></label>
		                        	<div class="pull-left" style="width:40%;">
		                            	<select id="contact_id" name="contact_id" class="selectpicker form-control" title="Select Contact Details">
		                            		@foreach($tender->contractor->contacts as $contact)
		                            		<option value="{{$contact->id}}" {{($tender->contact->id == $contact->id) ? 'selected' : ''}}>{{$contact->name}}</option>
		                            		@endforeach
	                        			</select>
		                            </div>
		                            <div class="pull-left" style="margin-left:10px;">
		                        		<button id="edit-contact-details" type="button" class="btn btn-sm btn-primary" title="Edit Contact Details" style="display:none;"><i class="fa fa-edit"></i> Edit Details</button>
		                        		<button id="add-new-contact" type="button" class="btn btn-sm btn-primary" title="New Contact" style="display:none;"><i class="fa fa-plus"></i> New Contact</button>
		                        	</div>
		                        	<div style="clear:both;"></div>
		                        </div>

	                		</td>
	                	</tr>
	                </table>
	                <table id="table-contact-details" class="table" style="margin-bottom:0px;">
		                <tr>
		                    <td style="vertical-align:middle;width:15%"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_email"></label>
		                            <input id="contact_email" name="contact_email" class="form-control" placeholder="email address (required)" value="{{$tender->contact->email}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contact Number</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_phone"></label>
		                            <input id="contact_phone" name="contact_phone" class="form-control" placeholder="contact number (required)" value="{{$tender->contact->phone}}"/>
		                        </div>
		                    </td>
		                </tr>
	                </table>
	                <table id="table-new-contact" class="table" style="display:none;">
		                <tr>
		                    <td style="vertical-align:middle;width:15%"><label>Grade</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="new_contact_grade"></label>
		                            <select id="new_contact_grade" name="new_contact_grade" class="form-control">
		                            	<option value="">Select Contact Grade</option>
		                            	<option value="A">Grade A</option>
		                            	<option value="B">Grade B</option>
		                            	<option value="C">Grade C</option>
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contact Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="new_contact_name"></label>
		                            <input id="new_contact_name" name="new_contact_name" class="form-control" placeholder="contact name (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="new_contact_email"></label>
		                            <input id="new_contact_email" name="new_contact_email" class="form-control" placeholder="email address (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contact Number</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="new_contact_phone"></label>
		                            <input id="new_contact_phone" name="new_contact_phone" class="form-control" placeholder="contact number (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                	<td></td>
		                	<td>
		                        <button id="search-contact-details" type="button" class="btn btn-sm btn-primary" title="Search contact details"><i class="fa fa-search"></i> Search existing contact</button>
		                	</td>
		                </tr>
	                </table>
	            </div>
        	</div>
    	</div>
	</div>
	<div class="col-lg-10">
		<div class="panel panel-primary">
        	<div class="panel-heading">Related Documents&nbsp;</div>
        	<div class="panel-body">
        		<div class="row col-lg-12">
					<div class="col-lg-4" style="width:auto;">
						<span class="btn btn-success btn-sm fileinput-button"><i class="glyphicon glyphicon-upload"></i><span>&nbsp;Upload Related Documents</span>
						<input id="fileupload-tender-documents" type="file" multiple style="cursor:pointer;">
					</span>
					<button id="fileupload-delete-all" type="button" class="btn btn-sm btn-danger" style="{{($tender->documents()->count() > 0) ? '' : 'display:none;'}}"><i class="fa fa-trash-o"></i> Remove All</button>
					</div>
					<div class="col-lg-8">
						<div id="fileupload-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="display:none;">
		                    <div class="progress-bar progress-bar-success"></div>
		                </div>
					</div>
				</div>
				<div id="fileupload-preview" class="row col-lg-12" style="margin-top:20px;height:auto;max-height:300px;overflow-y:auto;">
					@if($tender->documents()->count() > 0)
                	@foreach($tender->documents()->get() as $document)
    				<div class="upload-item row">
    					<div class="col-lg-1">
    						<a href="javascript:;" class="thumbnail">
    							@if($document->is_image)
    								<img src="{{$document->url->thumbnail}}">
    							@else
    								<span class="fa fa-file" style="font-size:30px;"></span>
    							@endif
    						</a>
    					</div>
    					<div class="col-lg-5">
    						<span class="fa fa-paperclip" style="font-size:30px;">
    						</span>&nbsp;<span>{{$document->text}}</span>
    						<input type="hidden" name="upload_name[]" value="{{$document->name}}">
    						<input type="hidden" name="upload_text[]" value="{{$document->text}}">
    					</div>
    					<div class="col-lg-5">
    						<input name="upload_note[]" class="form-control" placeholder="add note to this file" value="{{$document->note}}">
    					</div>
    					<div class="col-lg-1">
    						<button type="button" class="btn btn-sm btn-danger btn-delete-fileupload" delete-url="/upload/tenderdocuments/?file={{$document->name}}"><i class="fa fa-trash-o"></i> Remove</button>
    					</div>
    				</div>
    				@endforeach
    				@endif
				</div>
        	</div>
    	</div>
	</div>

	<div class="col-lg-10">
		<p style="text-align:center;">
			<a href="/admin/tenders/{{$tender->id}}"><button type="button" class="btn btn-default"><i class="icon-rotate-left"></i>&nbsp;Back</button></a>
			<button type="submit" class="btn btn-primary"><i class="icon-edit"></i>&nbsp;Submit</button>
		</p>
	</div>
	</form>
</div>
@stop
@section('header-css')
<link rel="stylesheet" type="text/css" href="/packages/dropzone/css/general.css"/>
@stop
@section('footer-js')
<script type="text/javascript">
window.ltp_fileupload.init_fileupload_actions();
window.ltp_admin.init_tender_scripts();
</script>
@stop