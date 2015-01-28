@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contractors</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-building"></i> Contractors</a></li>
            <li><a href="/admin/contractors">Manage Contractors</a></li>
            <li class="active">Edit Contractor Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Edit Contractor Details&nbsp;</div>        
        <div class="panel-body">
            <form id="form-update-contractor">
            	<input type="hidden" id="contractor_id" name="contractor_id" value="{{$contractor->id}}"/>
                <div class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> Contractor details has been updated
                </div>
	            <div class="table-responsive">
	                <table class="table">
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="name"></label>
		                            <input id="name" name="name" class="form-control" style="text-align:left;" placeholder="contractor name (required)" value="{{$contractor->name}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="email"></label>
		                            <input id="email" name="email" class="form-control" style="text-align:left;" placeholder="email address (required)" value="{{$contractor->email}}"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Contact Numbers</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="phone"></label>
		                            <input id="phone" name="phone" class="form-control" style="text-align:left;" placeholder="contact numbers" value="{{$contractor->phone}}"/>
		                        </div>
		                    </td>
		                </tr>
						<tr>
		                    <td style="width:vertical-align:middle;"><label>Business Address</label></td>
		                    <td>
		                    	<div class="form-inline">
			                        <div class="form-group" style="margin:0px;width:30%;">
			                            <label style="display:none;" class="control-label" for="business_address_street"></label>
			                            <input id="business_address_street" name="business_address_street" class="form-control" placeholder="street" style="width:100%;" value="{{$contractor->business_address_street}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="business_address_suburb"></label>
			                            <input id="business_address_suburb" name="business_address_suburb" class="form-control" placeholder="suburb" style="width:100%;" value="{{$contractor->business_address_suburb}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="business_address_state"></label>
			                            <input id="business_address_state" name="business_address_state" class="form-control" placeholder="state" style="width:100%;" value="{{$contractor->business_address_state}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="business_address_zip"></label>
			                            <input id="business_address_zip" name="business_address_zip" class="form-control" placeholder="zip code" style="width:100%;" value="{{$contractor->business_address_zip}}"/>
			                        </div>
			                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="width:vertical-align:middle;"><label>Postal Address</label></td>
		                    <td>
		                    	<div class="form-inline">
			                        <div class="form-group" style="margin:0px;width:30%;">
			                            <label style="display:none;" class="control-label" for="postal_address_street"></label>
			                            <input id="postal_address_street" name="postal_address_street" class="form-control" placeholder="street" style="width:100%;" value="{{$contractor->postal_address_street}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="postal_address_suburb"></label>
			                            <input id="postal_address_suburb" name="postal_address_suburb" class="form-control" placeholder="suburb" style="width:100%;" value="{{$contractor->postal_address_suburb}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="postal_address_state"></label>
			                            <input id="postal_address_state" name="postal_address_state" class="form-control" placeholder="state" style="width:100%;" value="{{$contractor->postal_address_state}}"/>
			                        </div>
			                        <div class="form-group" style="margin:0px;width:20%;">
			                            <label style="display:none;" class="control-label" for="postal_address_zip"></label>
			                            <input id="postal_address_zip" name="postal_address_zip" class="form-control" placeholder="zip code" style="width:100%;" value="{{$contractor->postal_address_zip}}"/>
			                        </div>
			                    </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Australian Business Number (ABN)</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;width:20%;">
		                            <label style="display:none;" class="control-label" for="abn"></label>
		                            <input id="abn" name="abn" class="form-control" placeholder="australian business number" value="{{$contractor->abn}}"/>
		                        </div>
		                    </td>
		                </tr>
	                	<tr>
	                		<td colspan="2" style="text-align:center;">
	                			<a href="/admin/contractors">
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
window.ltp_admin.init_contractor_scripts();
</script>
@stop