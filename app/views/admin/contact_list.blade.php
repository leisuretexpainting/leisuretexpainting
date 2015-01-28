@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contacts</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-book"></i> Contacts</a></li>            
            <li class="active">Manage Contacts</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="panel-top-buttons"><a href="/admin/contacts/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New $contact</button></a></div>
		<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Manage Contacts</span>
        	</div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow:hidden;">
                    <table id="admin-contacts-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">Id</th>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Email Address</th>
                                <th style="width:auto;">Contact Number</th>
                                <th style="width:auto;">Contractor Name</th>
                                <th style="width:22%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($contacts as $contact)
                            <tr>
                            	<td>{{$contact->id}}</td>
                            	<td>{{$contact->name}}</td>
                            	<td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->contractor->name or 'None'}}</td>
                                <td class="center">
                                    <div class="btn-group" user="group">
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/contacts/{{$contact->id}}'" title="Update $contact details"><i class="fa fa-search-plus"></i> View Full Details</button>
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/contacts/{{$contact->id}}/edit'" title="Update $contact details"><i class="fa fa-edit"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-default btn-remove-$contact" $contact-id="{{$contact->id}}" title="Remove this $contact"><i class="fa fa-trash-o"></i> Remove</button>
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
window.ltp_admin.init_contact_scripts();
</script>
@stop