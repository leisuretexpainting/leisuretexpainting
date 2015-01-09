@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Roles</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">Manage User Roles</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
    	<div class="panel-top-buttons"><a href="/admin/userroles/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New User Role</button></a></div>
		<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Manage User Roles</span>
        	</div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow:hidden;">
                    <table id="admin-userroles-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">Id</th>
                                <th style="width:30%;">Title</th>
                                <th style="width:auto;">Permissions</th>
                                <th style="width:10%">Status</th>
                                <th style="width:25%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($userRoles as $userRole)
                            <tr>
                            	<td>{{$userRole->id}}</td>
                                <td>{{$userRole->title}}</td>
                                <td>N/A</td>
                                <td>{{($userRole->is_active == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning available">Inactive</span>'}}</td>
                                <td class="center">
                                    <div class="btn-group" role="group">
                                    	<button type="button" class="btn btn-sm btn-default btn-userrole-deactivate" style="{{($userRole->is_active == 0) ? 'display:none;' : '' }}" title="Deactivate this role"><i class="fa fa-ban"></i> Deactivate</button>
                                    	<button type="button" class="btn btn-sm btn-default btn-userrole-activate" style="{{($userRole->is_active == 1) ? 'display:none;' : '' }}" title="Activate this role"><i class="fa fa-check"></i> Activate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/userroles/{{$userRole->id}}/edit'" title="Update role details"><i class="fa fa-edit"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-default btn-userrole-remove" title="Remove this role" role-id="{{$userRole->id}}"><i class="fa fa-trash-o"></i> Remove</button>
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
<script src="/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
ltp_admin.init_dataTables();
</script>

@stop