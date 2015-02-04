@extends('layouts.admin')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contractors</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="icon-building"></i> Contractors</a></li>            
            <li class="active">Manage Contractors</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="panel-top-buttons"><a href="/admin/contractors/create"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New Contractor</button></a></div>
		<div class="panel panel-primary">
        	<div class="panel-heading">
        		<span class="panel-title">Manage Contractors</span>
        	</div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow:hidden;">
                    <table id="admin-contractors-list" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">Id</th>
                                <th style="width:auto;">Name</th>
                                <th style="width:auto;">Email Address</th>
                                <th style="width:auto;">Contact Number</th>
                                <th style="width:auto;">ABN</th>
                                <th style="width:22%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($contractors as $contractor)
                            <tr>
                            	<td>{{$contractor->id}}</td>
                            	<td>{{$contractor->name}}</td>
                            	<td>{{$contractor->email}}</td>
                                <td>{{$contractor->phone}}</td>
                                <td>{{$contractor->abn}}</td>
                                <td class="center">
                                    <div class="btn-group" user="group">
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/contractors/{{$contractor->id}}'" title="Update contractor details"><i class="fa fa-search-plus"></i> View Full Details</button>
                                        <button type="button" class="btn btn-sm btn-default" onClick="window.location='/admin/contractors/{{$contractor->id}}/edit'" title="Update contractor details"><i class="fa fa-edit"></i> Update</button>
                                        <button type="button" class="btn btn-sm btn-default btn-remove-contractor" contractor-id="{{$contractor->id}}" title="Remove this contractor"><i class="fa fa-trash-o"></i> Remove</button>
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
window.ltp_admin.init_contractor_scripts();
</script>
@stop