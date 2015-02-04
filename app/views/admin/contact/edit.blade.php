@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contact</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-book"></i> Contacts</a></li>
            <li><a href="/admin/contractors">Manage Contact</a></li>
            <li class="active">Edit Contact Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Edit Contact Details&nbsp;</div>        
        <div class="panel-body">
            <form id="form-update-contact">
            	<input type="hidden" id="contact_id" name="contact_id" value="{{$contact->id}}"/>
                <div class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> Contact details has been updated
                </div>
	            <div class="table-responsive">	            	
	                <table class="table">
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contractor</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%;">
		                            <select id="contractor_id" name="contractor_id" class="form-control">
		                            	<option value="">Select Contractor</option>
		                            	@foreach($contractors as $contractor)
		                                <option value="{{$contractor->id}}" {{(isset($contact->contractor->id) && $contractor->id == $contact->contractor->id) ? 'selected' : '' }}>{{$contractor->name}}</option>
		                                @endforeach
	                        		</select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Grade</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%">
		                            <label style="display:none;" class="control-label" for="grade"></label>
		                            <select id="grade" name="grade" class="form-control">
		                            	<option value="" selected>Select Contact Grade</option>
		                            	<option value="A" {{($contact->grade == 'A') ? 'selected' : ''}}>Grade A</option>
		                            	<option value="B" {{($contact->grade == 'B') ? 'selected' : ''}}>Grade B</option>
		                            	<option value="C" {{($contact->grade == 'C') ? 'selected' : ''}}>Grade C</option>
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="name"></label>
		                            <input id="name" name="name" class="form-control" style="text-align:left;" placeholder="contact name (required)" value="{{$contact->name}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="email"></label>
		                            <input id="email" name="email" class="form-control" style="text-align:left;" placeholder="email address (required)" value="{{$contact->email}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contact Numbers</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="phone"></label>
		                            <input id="phone" name="phone" class="form-control" style="text-align:left;" placeholder="contact numbers" value="{{$contact->phone}}"/>
		                        </div>
		                    </td>
		                </tr>
						<tr>
		                    <td style="width:vertical-align:middle;"><label>Address</label></td>
		                    <td>
		                    	<div class="form-inline">
			                        <div class="form-group" style="margin:0px;width:30%;">
			                            <label style="display:none;" class="control-label" for="address_street"></label>
			                            <input id="address_street" name="address_street" class="form-control" placeholder="street" style="width:100%;" value="{{$contact->address_street}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_suburb"></label>
			                            <input id="address_suburb" name="address_suburb" class="form-control" placeholder="suburb" style="width:100%;" value="{{$contact->address_suburb}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_state"></label>
			                            <input id="address_state" name="address_state" class="form-control" placeholder="state" style="width:100%;" value="{{$contact->address_state}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_zip"></label>
			                            <input id="address_zip" name="address_zip" class="form-control" placeholder="zip code" style="width:100%;" value="{{$contact->address_zip}}"/>
			                        </div>
			                    </div>
		                    </td>
		                </tr>
	                	<tr>
	                		<td colspan="2" style="text-align:center;">
	                			<a href="/admin/contacts">
				                    <button type="button" class="btn btn-default"><i class="icon-rotate-left"></i>Back</button>
				                </a>
	                			<button type="submit" class="btn btn-primary">Update</button>
	                		</td>
	                	</tr>
	                </table>
	            </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop

@section('footer-js')
<script type="text/javascript">
window.ltp_admin.init_contact_scripts();
</script>
@stop