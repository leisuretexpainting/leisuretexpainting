@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Roles</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="/admin/userroles">Manage User Roles</a></li>
            <li class="active">Update User Role</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
    	<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Update User Role: {{$userRole->title}}</span>
        	</div>
            <div class="panel-body">
            <form id="form-update-userrole">
                <div class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> User role has been updated
                </div>
            <div class="table-responsive">
                <table class="table">
                	<tr>
                		<td style="width:180px;"><label>Id</label></td>
                		<td>
                			{{$userRole->id}}
                			<input type="hidden" id="role_id" name="role_id" value="{{$userRole->id}}"/>
                		</td>
                	</tr>
	                <tr>
	                    <td><label>Title</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="title"></label>
	                            <input id="title" name="title" class="form-control" value="{{$userRole->title}}"/>
	                        </div>
	                    </td>
	                </tr>
                    <tr>
                        <td style="vertical-align:middle;width:180px;"><label>Set status as</label></td>
                        <td>
                            <div class="form-group" style="margin:0px;">
                                <label style="display:none;" class="control-label" for="is_active"></label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option value="1" {{($userRole->is_active == 1) ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{($userRole->is_active == 0) ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                        </td>
                    </tr>
	                <tr>
	                    <td style="vertical-align:middle;width:180px;"><label>Permissions</label></td>
	                    <td>
	                        N/A
	                    </td>
	                </tr>
                	<tr><td colspan="2" style="text-align:center;"><button type="submit" class="btn btn-primary">Update</button></td></tr>
                </table>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@stop