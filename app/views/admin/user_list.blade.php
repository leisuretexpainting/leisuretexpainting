@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">Manage Users</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
    	<div class="panel-top-buttons"><a href="/admin/users/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New User</button></a></div>
		<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Manage Users</span>
        	</div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow:hidden;">
                    <table id="admin-users-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">Id</th>
                                <th style="width:auto;">Role</th>
                                <th style="width:auto;">Username</th>
                                <th style="width:auto;">First Name</th>
                                <th style="width:auto;">Last Name</th>
                                <th style="width:auto;">Email Address</th>
                                <th style="width:22%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($users as $user)
                            <tr>
                            	<td>{{$user->id}}</td>
                            	<td>{{$user->role->title}}</td>
                            	<td>{{$user->username}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="center">
                                    <div class="btn-group" user="group">
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/users/{{$user->id}}'" title="Update user details"><i class="fa fa-search-plus"></i> View Full Details</button>
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/users/{{$user->id}}/edit'" title="Update user details"><i class="fa fa-edit"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-default btn-remove-user" user-id="{{$user->id}}" title="Remove this user"><i class="fa fa-trash-o"></i> Remove</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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