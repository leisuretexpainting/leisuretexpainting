@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="/admin/users">Manage Users</a></li>
            <li class="active">User Details</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
        <div class="panel-heading">User Details&nbsp;</div>        
        <div class="panel-body">
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Role:</label></div>
                <div class="col-lg-10">{{$user->role->title}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Username:</label></div>
                <div class="col-lg-10">{{$user->username}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Name:</label></div>
                <div class="col-lg-10">{{$user->name}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Date of Birth:</label></div>
                <div class="col-lg-10">{{date('M d, Y',strtotime($user->birthdate))}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Email Address:</label></div>
                <div class="col-lg-10">{{$user->email}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Contact Number:</label></div>
                <div class="col-lg-10">{{$user->phone ? $user->phone : 'N/A'}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Address:</label></div>
                <div class="col-lg-10">{{$user->street}} {{$user->suburb}} {{$user->state}} {{$user->zip}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Created at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($user->created_at))}}</div>
            </div>
            <div class="row col-lg-12">
                <div class="col-lg-2"><label class="control-label">Updated at:</label></div>
                <div class="col-lg-10">{{date('M d, Y H:g:s',strtotime($user->updated_at))}}</div>
            </div>
            <div class="row col-lg-12" style="text-align:center;">
                <a href="/admin/users">
                    <button type="button" class="btn btn-default"><i class="icon-rotate-left"></i>Back</button>
                </a>
                <a href="/admin/users/{{$user->id}}/edit">
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
window.ltp_admin.init_user_scripts();
</script>
@stop