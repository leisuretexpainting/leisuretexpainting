@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contractors</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-building"></i> Contractors</a></li>            
            <li><a href="/admin/contractors">Manage Contractors</a></li>
            <li class="active">View Contractor Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Contractor Details&nbsp;</div>        
        <div class="panel-body">
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Name:</label></div>
                <div class="col-lg-10">{{$contractor->name}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Email Address:</label></div>
                <div class="col-lg-10">{{$contractor->email}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Contact Number:</label></div>
                <div class="col-lg-10">{{$contractor->phone}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Business Address:</label></div>
                <div class="col-lg-3">{{$contractor->business_address_street}}</div>
                <div class="col-lg-2">{{$contractor->business_address_suburb}}</div>
                <div class="col-lg-2">{{$contractor->business_address_state}}</div>
                <div class="col-lg-1">{{$contractor->business_address_zip}}</div>
            </div>
            <div class="row col-lg-12" style="margin-bottom:15px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-3"><i><strong>Street</strong></i></div>
                <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                <div class="col-lg-2"><i><strong>State</strong></i></div>
                <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Postal Address:</label></div>
                <div class="col-lg-3">{{$contractor->postal_address_street}}</div>
                <div class="col-lg-2">{{$contractor->postal_address_suburb}}</div>
                <div class="col-lg-2">{{$contractor->postal_address_state}}</div>
                <div class="col-lg-1">{{$contractor->postal_address_zip}}</div>
            </div>
            <div class="row col-lg-12" style="margin-bottom:15px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-3"><i><strong>Street</strong></i></div>
                <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                <div class="col-lg-2"><i><strong>State</strong></i></div>
                <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Australian Business Number (ABN):</label></div>
                <div class="col-lg-10">{{$contractor->abn}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Created at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($contractor->created_at))}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Updated at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($contractor->updated_at))}}</div>
            </div>
            <div class="row col-lg-12" style="text-align:center;">
                <a href="/admin/contractors">
                    <button type="button" class="btn btn-default"><i class="icon-rotate-left"></i>Back</button>
                </a>
                <a href="/admin/contractors/{{$contractor->id}}/edit">
                    <button type="button" class="btn btn-primary"><i class="icon-edit"></i>Update</button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('footer-js')
<script type="text/javascript">
window.ltp_admin.init_contactor_scripts();
</script>
@stop