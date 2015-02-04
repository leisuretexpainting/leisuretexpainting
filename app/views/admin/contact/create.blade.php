@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contacts</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-book"></i> Contacts</a></li>            
            <li class="active">Create New Contact</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Create New Contact&nbsp;</div>        
        <div class="panel-body">
            <form id="form-create-contact">
                <div class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> New Contact has been created
                </div>
	            <div class="table-responsive">
	                <table class="table">
	                	<tr>
		                    <td style="vertical-align:middle;"><label>Contractor</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:40%;">
		                            <select id="contractor_id" name="contractor_id" class="form-control">
		                            	<option value="" selected>Select Contractor</option>
		                            	@foreach($contractors as $contractor)
		                                <option value="{{$contractor->id}}">{{$contractor->name}}</option>
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
		                            	<option value="A">Grade A</option>
		                            	<option value="B">Grade B</option>
		                            	<option value="C">Grade C</option>
		                            </select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="name"></label>
		                            <input id="name" name="name" class="form-control" style="text-align:left;" placeholder="contact name (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="email"></label>
		                            <input id="email" name="email" class="form-control" style="text-align:left;" placeholder="email address (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;"><label>Contact Numbers</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="phone"></label>
		                            <input id="phone" name="phone" class="form-control" style="text-align:left;" placeholder="contact numbers"/>
		                        </div>
		                    </td>
		                </tr>
						<tr>
		                    <td style="width:vertical-align:middle;"><label>Address</label></td>
		                    <td>
		                    	<div class="form-inline">
			                        <div class="form-group" style="margin:0px;width:30%;">
			                            <label style="display:none;" class="control-label" for="address_street"></label>
			                            <input id="address_street" name="address_street" class="form-control" placeholder="street" style="width:100%;"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_suburb"></label>
			                            <input id="address_suburb" name="address_suburb" class="form-control" placeholder="suburb" style="width:100%;"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_state"></label>
			                            <input id="address_state" name="address_state" class="form-control" placeholder="state" style="width:100%;"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="address_zip"></label>
			                            <input id="address_zip" name="address_zip" class="form-control" placeholder="zip code" style="width:100%;"/>
			                        </div>
			                    </div>
		                    </td>
		                </tr>
	                	<tr><td colspan="2" style="text-align:center;"><button type="submit" class="btn btn-primary">Create</button></td></tr>
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