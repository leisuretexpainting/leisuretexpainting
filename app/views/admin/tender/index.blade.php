@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tender Listing</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="fa fa-file"></i> tenders</a></li>
            <li class="active">Manage Tenders</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="panel-top-buttons"><a href="/admin/tenders/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Tender</button></a></div>
		<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Manage Tender Details</span>
        	</div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow:hidden;">
                    <table id="admin-tenders-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">Id</th>
                                <th style="width:auto">Project Name</th>
                                <th style="width:20%;">Contractor Name</th>
                                <th style="width:10%">Contact Name</th>
                                <th style="width:10%">Sales Representative</th>
                                <th style="width:10%">Status</th>
                                <th style="width:20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($tenders as $tender)
                            <tr>
                            	<td>{{$tender->id}}</td>
                                <td>{{$tender->project->name}}</td>
                                <td>{{$tender->contractor->name}}</td>
                                <td>{{$tender->contact->name}}</td>
                                <td>{{$tender->sales->name}}</td>
                                <td>{{$tender->tenderStatus->text}}</td>
                                <td class="center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/tenders/{{$tender->id}}'" title="View tender details"><i class="fa fa-search-plus"></i> View Full Details</button>
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/tenders/{{$tender->id}}/edit'" title="Update tender details"><i class="fa fa-edit"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-default btn-remove-tender" title="Remove this tender" tender-id="{{$tender->id}}"><i class="fa fa-trash-o"></i> Remove</button>
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
window.ltp_admin.init_dataTables();
window.ltp_admin.init_tender_scripts();
</script>

@stop