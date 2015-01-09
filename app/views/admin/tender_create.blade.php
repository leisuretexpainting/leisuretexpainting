@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tender Setup</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Tenders</a></li>
            <li class="active">Crew New Tender</li>
        </ol>
    </div>
</div>
<div class="row">
	<form id="form-create-user">
    <div class="alert alert-success alert-dismissable" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Success!</strong> New Tender has been created
    </div>

	<div class="col-lg-10">
		<div class="panel panel-primary">
        	<div class="panel-heading">Contactor Details&nbsp;</div>
        	<div class="panel-body">
	            <div class="table-responsive">
	                <table class="table">
		                <tr>
		                    <td style="vertical-align:middle;width:15%"><label>Contractor</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contactor_name"></label>
		                            <input id="contactor_name" name="contactor_name" class="form-control" style="text-align:left;" placeholder="name (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Business Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="contactor_business_address_street"></label>
		                            <input id="contactor_business_address_street" name="contactor_business_address_street" class="form-control" placeholder="street" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_business_address_suburb"></label>
		                            <input id="contactor_business_address_suburb" name="contactor_business_address_suburb" class="form-control" placeholder="suburb" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_business_address_state"></label>
		                            <input id="contactor_business_address_state" name="contactor_business_address_state" class="form-control" placeholder="state" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_business_address_zip"></label>
		                            <input id="contactor_business_address_zip" name="contactor_business_address_zip" class="form-control" placeholder="zip code" style="width:100%;"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Postal Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="contactor_postal_address_street"></label>
		                            <input id="contactor_postal_address_street" name="contactor_postal_address_street" class="form-control" placeholder="street" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_postal_address_suburb"></label>
		                            <input id="contactor_postal_address_suburb" name="contactor_postal_address_suburb" class="form-control" placeholder="suburb" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_postal_address_state"></label>
		                            <input id="contactor_postal_address_state" name="contactor_postal_address_state" class="form-control" placeholder="state" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="contactor_postal_address_zip"></label>
		                            <input id="contactor_postal_address_zip" name="contactor_postal_address_zip" class="form-control" placeholder="zip code" style="width:100%;"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>ABN</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="abn"></label>
		                            <input id="abn" name="abn" class="form-control" style="text-align:left;" placeholder="australian business number"/>
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
	            <div class="table-responsive">
	                <table class="table">
		                <tr>
		                    <td style="vertical-align:middle;width:15%"><label>Grade</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_grade"></label>
		                            <select id="contact_grade" name="contact_grade" class="form-control">
		                            	<option>Select Grade</option>
		                            	<option>Grade A</option>
		                            	<option>Grade B</option>
		                            	<option>Grade C</option>
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Contact Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_name"></label>
		                            <input id="contact_name" name="contact_name" type="contact_name" class="form-control" placeholder="contact (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_email"></label>
		                            <input id="contact_email" name="contact_email" class="form-control" placeholder="email address (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Contact Number</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="contact_number"></label>
		                            <input id="contact_number" name="contact_number" class="form-control" placeholder="contact number (required)"/>
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
        	<div class="panel-heading">Job Details&nbsp;</div>
        	<div class="panel-body">
	            <div class="table-responsive">
	                <table class="table">
	                	<tr>
		                    <td style="vertical-align:middle;width:15%"><label>Due Date</label></td>
		                    <td>
		                    	<div class="form-group" style="margin:0px;width:40%">
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <i class="fa fa-calendar"></i>
		                                </div>
		                                <input id="job_duedate" name="job_duedate" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" placeholder="mm/dd/yyyy">
		                            </div>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Sales Representative</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:91%;">
		                            <label style="display:none;" class="control-label" for="job_sales_representative"></label>
		                            <input id="job_sales_representative" name="job_sales_representative" class="form-control" style="text-align:left;" placeholder="Sales Representative (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Job Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:91%;">
		                            <label style="display:none;" class="control-label" for="job_name"></label>
		                            <input id="job_name" name="job_name" class="form-control" style="text-align:left;" placeholder="job name (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Job Type</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="job_type"></label>
		                            <select id="job_type" name="job_type" class="form-control">
		                            	<option>Select Job Type</option>
		                            	<option>Body Corporate / Commercial</option>
		                            	<option>New Construction</option>
		                            	<option>Residential / Private</option>
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Job Address</label></td>
		                    <td>
		                    	<div class="form-inline">
		                        <div class="form-group" style="margin:0px;width:30%;">
		                            <label style="display:none;" class="control-label" for="job_address_street"></label>
		                            <input id="job_address_street" name="job_address_street" class="form-control" placeholder="street" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="job_address_suburb"></label>
		                            <input id="job_address_suburb" name="job_address_suburb" class="form-control" placeholder="suburb" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="job_address_state"></label>
		                            <input id="job_address_state" name="job_address_state" class="form-control" placeholder="state" style="width:100%;"/>
		                        </div>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="job_address_zip"></label>
		                            <input id="job_address_zip" name="job_address_zip" class="form-control" placeholder="zip code" style="width:100%;"/>
		                        </div>
		                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Related Documents</label></td>
		                    <td>
		                    	 <div style="position:relative;">
		                            <span class="btn btn-success btn-sm fileinput-button"><i class="glyphicon glyphicon-upload"></i><span>&nbsp;Upload Related Documents</span>
										<input id="upload-profile-image" type="file" data-url="" style="cursor:pointer;">
									</span>
								</div>
		                    </td>
		                </tr>
	                </table>
	            </div>
        	</div>
    	</div>
	</div>

	<div class="col-lg-10">
		<p style="text-align:center;"><button type="button" class="btn btn-primary btn-lg">Submit Tender Details</button></p>
	</div>
	</form>
</div>
@stop

@section('footer-js')
<script src="/assets/js/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.iframe-transport.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-process.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-validate.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-ui.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/assets/js/plugins/JQueryFileUpload/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<script src="/assets/js/fileupload.js"></script>
<script type="text/javascript">
$("#job_duedate").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
</script>
@stop