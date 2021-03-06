@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-users"></i> Users</a></li>
            <li><a href="/admin/users">Manage Users</a></li>
            <li class="active">Crew New User</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
        <div class="panel-heading">Create New User&nbsp;</div>        
        <div class="panel-body">
            <form id="form-create-user">
                <div class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> New User has been created
                </div>
	            <div class="table-responsive">
	                <table class="table">
	                	<tr>
		                    <td style="vertical-align:middle;"><label>Role</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <select id="role_id" name="role_id" class="form-control">
		                            	@foreach($userRoles as $role)
		                                <option value="{{$role->id}}">{{$role->title}}</option>
		                                @endforeach
	                        		</select>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Username</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="username"></label>
		                            <input id="username" name="username" class="form-control" style="text-align:left;" placeholder="username (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Password</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="password"></label>
		                            <input id="password" name="password" type="password" class="form-control" placeholder="password (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Confirm Password</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="password_confirmation"></label>
		                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="re-type password (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Email Address</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="email"></label>
		                            <input id="email" name="email" class="form-control" placeholder="email address (required)"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>First Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="first_name"></label>
		                            <input id="first_name" name="first_name" class="form-control" placeholder="first name"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Last Name</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="last_name"></label>
		                            <input id="last_name" name="last_name" class="form-control" placeholder="last name"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Birthdate</label></td>
		                    <td>
		                        <div class="form-group">
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <i class="fa fa-calendar"></i>
		                                </div>
		                                <input id="birthdate" name="birthdate" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" placeholder="mm/dd/yyyy">
		                            </div>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Street</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="address_street"></label>
		                            <input id="address_street" name="address_street" class="form-control" placeholder="street"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Suburb</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="address_suburb"></label>
		                            <input id="address_suburb" name="address_suburb" class="form-control" placeholder="suburb"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>State</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="address_state"></label>
		                            <input id="address_state" name="address_state" class="form-control" placeholder="state"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Zip Code</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="address_zip"></label>
		                            <input id="address_zip" name="address_zip" class="form-control" placeholder="zip code"/>
		                        </div>
		                    </td>
		                </tr>
		                <tr>
		                    <td style="vertical-align:middle;width:180px;"><label>Contact Number</label></td>
		                    <td>
		                        <div class="form-group" style="margin:0px;">
		                            <label style="display:none;" class="control-label" for="phone"></label>
		                            <input id="phone" name="phone" class="form-control" placeholder="contact number"/>
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
window.ltp_admin.init_user_scripts();
</script>
@stop