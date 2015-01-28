@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contacts</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-book"></i> Contacts</a></li>            
            <li><a href="/admin/contractors">Manage Contacts</a></li>
            <li class="active">View Contact Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Contact Details&nbsp;</div>        
        <div class="panel-body">
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Grade:</label></div>
                <div class="col-lg-10">{{$contact->grade}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Name:</label></div>
                <div class="col-lg-10">{{$contact->name}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Contractor Name:</label></div>
                <div class="col-lg-10">{{$contact->contractor->name}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Email Address:</label></div>
                <div class="col-lg-10">{{$contact->email}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Contact Number:</label></div>
                <div class="col-lg-10">{{$contact->phone}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Address:</label></div>
                <div class="col-lg-3">{{$contact->address_street}}</div>
                <div class="col-lg-2">{{$contact->address_suburb}}</div>
                <div class="col-lg-2">{{$contact->address_state}}</div>
                <div class="col-lg-1">{{$contact->address_zip}}</div>
            </div>
            <div class="row col-lg-12" style="margin-bottom:15px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-3"><i><strong>Street</strong></i></div>
                <div class="col-lg-2"><i><strong>Suburb</strong></i></div>
                <div class="col-lg-2"><i><strong>State</strong></i></div>
                <div class="col-lg-1"><i><strong>Zip Code</strong></i></div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Created at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($contact->created_at))}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Updated at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($contact->updated_at))}}</div>
            </div>
            <div class="row col-lg-12" style="text-align:center;">
                <a href="/admin/contacts">
                    <button type="button" class="btn btn-default"><i class="icon-rotate-left"></i>Back</button>
                </a>
                <a href="/admin/contacts/{{$contact->id}}/edit">
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
window.ltp_admin.init_contact_scripts();
</script>
@stop